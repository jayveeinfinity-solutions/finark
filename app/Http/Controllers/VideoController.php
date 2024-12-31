<?php

namespace App\Http\Controllers;

use getID3;
use Inertia\Inertia;
use App\Models\Video;
use App\Models\Course;
use App\Models\WatchVideo;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Resources\VideoResource;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Http\Requests\Video\UpdateVideoRequest;

class VideoController extends Controller
{
    protected $layout = 'corporate-ui';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $course_id = NULL)
    {
        Inertia::setRootView($this->layout);

        if(!is_null($course_id)) {
            $course = new CourseResource(Course::with('videos')->findOrFail($course_id));
        }

        return Inertia::render('Admin/Videos/Chunks', compact('course'));
    }

    /**
     * Upload video file.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request) {
        $filename = NULL;
        if($request->hasFile('file')) {
            $uploadedFile = $request->file('file');
            $filename = $request->filename . '.' . $uploadedFile->clientExtension();

            Storage::disk('videos')->putFileAs(
                '',
                $uploadedFile,
                '/course-' . $request->course_id . '/' . $filename
            );
        }

        Video::create([
            'name' => 'Untitled',
            'filename' => $filename,
            'course_id' => $request->course_id
        ]);

        return back();
    }

    public function uploadChunks(Request $request) {
        $file = $request->file('file');

        $path = storage_path('app/public/chunks/' . $file->getClientOriginalName());
        $newPath = storage_path('app/public/videos/course-' . $request->course_id . '/');

        File::append($path, $file->get());

        $uid = null;

        if ($request->has('is_last') && $request->boolean('is_last')) {
            // Make sure that course directory exists and
            // automatically create the course directory if not exists.
            File::ensureDirectoryExists($newPath);
            
            // Remove .part extension and retain original filename 
            $name = basename($path, '.part');

            // Unique video id
            $uid = uniqid();
            $slug = Str::slug(basename($name, '.mp4'));
            
            // Move the file to course folder
            File::move($path, $newPath . "{$slug}.mp4" );

            // Create new record of the video to the database
            Video::create([
                'name' => basename($name, '.mp4'),
                'uid' => $uid,
                'filename' => "{$slug}.mp4",
                'course_id' => $request->course_id
            ]);
        }

        return response()->json(['uid' => $uid]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        $video = Video::create($request->validated());

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
    {
        Inertia::setRootView($this->layout);

        $video = new VideoResource(Video::with('courses', 'users')->where('uid', $uid)->firstOrFail());
        $watchVideo = WatchVideo::where('user_id', auth()->user()->id)
            ->where('video_id', $video->id)->first();

        return Inertia::render('Admin/Videos/Show', compact('video', 'watchVideo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($video_id)
    {
        Inertia::setRootView($this->layout);

        $video = Video::with('courses')->where('uid', $video_id)->first();

        return Inertia::render('Admin/Videos/Edit', compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request)
    {
        $video = Video::findOrFail($request->id);

        $video->update($request->validated());
        
        if($request->description) {
            $video->description = $request->description;
            $video->visibility = $request->visibility;
            $video->save();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getVideo(Video $video)
    {
        $path = storage_path('app\public\videos\\course-' . $video->course_id . '\\' . $video->filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file, 200);
        $response->header("Content-Type", $type);

        return $response;
    }
}
