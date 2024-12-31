<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Video;
use App\Models\Course;
use App\Models\WatchVideo;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Http\Resources\CourseResource;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\Course\StoreCourseRequest;
use App\Http\Requests\Course\UpdateCourseRequest;

class CourseController extends Controller
{
    protected $layout = 'corporate-ui';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Inertia::setRootView($this->layout);

        if(auth()->user()->hasAnyRole('developer', 'admin')) {
            $courses = CourseResource::collection(Course::with('users', 'videos')->get());
        } else {
            $courses = CourseResource::collection(Course::with('users', 'videos')->where('visibility', 1)->get());
        }
        $totalCourses = $courses->count();
        $totalVideos = Video::all()->count();
        $totalVideosCompleted = WatchVideo::where('completed', 1)->count();
        $totalUsersCompleted = WatchVideo::where('completed', 1)->groupBy(['user_id', 'video_id'])->count();

        $breadCrumbs = request()->getPathInfo();

        return Inertia::render('Admin/Courses/Index', compact('courses', 'totalCourses', 'totalVideos', 'totalVideosCompleted', 'totalUsersCompleted', 'breadCrumbs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Inertia::setRootView($this->layout);

        return Inertia::render('Admin/Courses/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Course\StoreCourseRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCourseRequest $request)
    {
        $course = Course::create($request->validated());

        $filename = NULL;
        if($request->hasFile('poster')) {
            $uploadedFile = $request->file('poster');
            $filename = Str::slug($request->name, '-') . '.' . $uploadedFile->clientExtension();

            Storage::disk('course_posters')->putFileAs(
                '',
                $uploadedFile,
                $filename
            );

            $course->update(['poster' => $filename]);
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Inertia::setRootView($this->layout);

        $course = new CourseResource(Course::with('users', 'videos')->findOrFail($id));

        return Inertia::render('Admin/Courses/Show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($course_id)
    {
        Inertia::setRootView($this->layout);

        $course = new CourseResource(Course::findOrFail($course_id));

        return Inertia::render('Admin/Courses/Edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCourseRequest $request)
    {
        $course = Course::findOrFail($request->id);

        $course->update($request->validated());

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

    public function getPoster(Course $course)
    {
        $path = storage_path('app\public\courses\posters\\' . $course->poster);

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
