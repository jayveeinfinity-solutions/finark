<?php

namespace App\Http\Resources;

use getID3;
use Carbon\Carbon;
use App\Models\Video;
use App\Models\WatchVideo;
use Carbon\CarbonInterval;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'uid' => $this->uid,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'poster' => $this->poster,
            'filename' => $this->filename,
            'sequence' => $this->sequence,
            'course_id' => $this->course_id,
            'course' => $this->courses,
            'visibility' => $this->visibility,
            'uploaded_by' => $this->uploaded_by,
            'user' => $this->users,
            'created_at' => $this->created_at,
            'udpated_at' => $this->updated_at,
            'duration' => $this->duration,
            'time_humans' => CarbonInterval::seconds($this->duration)->cascade()->forHumans(null, true),
            'timeago' => Carbon::parse($this->created_at)->diffForHumans(),
            'watched' => $this->watchHistory(),
            'prev_video' => $this->prevVideo(),
            'next_video' => $this->nextVideo()
        ];
    }

    protected function prevVideo() {
        $video = Video::where('course_id', $this->course_id)->where('sequence', $this->sequence - 1)->first();

        return $video ? $video->uid : null;
    }

    protected function nextVideo() {
        $video = Video::where('course_id', $this->course_id)->where('sequence', $this->sequence + 1)->first();
        
        return $video ? $video->uid : null;
    }

    protected function watchHistory() {
        $user_id = auth()->user()->id;
        return WatchVideo::where('user_id', $user_id)->where('video_id', $this->id)->first();
    }
}