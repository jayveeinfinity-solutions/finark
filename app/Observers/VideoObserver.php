<?php

namespace App\Observers;

use getID3;
use App\Models\Video;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class VideoObserver
{
    /**
     * Handle the Video "creating" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function creating(Video $video)
    {
        // Create slug for the video name
        $video->slug = Str::slug($video->name);
        $video->uploaded_by = auth()->user()->id;

        $count = Video::where('course_id', $video->course_id)->count();

        $video->sequence = $count + 1;

        $path = storage_path('app/public/videos/course-' . $video->course_id . '/' . $video->filename);
        $getID3 = new getID3;
        
        if(File::exists($path)) {
            $video_file = $getID3->analyze($path);
    
            if(Arr::exists($video_file, 'playtime_seconds')) {
                $video->duration = $video_file['playtime_seconds'];
            }
        }
    }
    /**
     * Handle the Video "created" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function created(Video $video)
    {
        //
    }

    /**
     * Handle the Video "updating" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function updating(Video $video)
    {
        // Create slug for the video name
        $video->slug = Str::slug($video->name);
    }

    /**
     * Handle the Video "updated" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function updated(Video $video)
    {
        //
    }

    /**
     * Handle the Video "deleted" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function deleted(Video $video)
    {
        //
    }

    /**
     * Handle the Video "restored" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function restored(Video $video)
    {
        //
    }

    /**
     * Handle the Video "force deleted" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function forceDeleted(Video $video)
    {
        //
    }
}
