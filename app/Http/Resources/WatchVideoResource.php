<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class WatchVideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'video' => [
                'video_id' => $this->video_id,
                'uid' => $this->videos->uid,
                'name' => $this->videos->name,
                'slug' => $this->videos->slug,
                'description' => $this->videos->description,
                'poster' => $this->videos->poster,
                'filename' => $this->videos->filename,
                'duration' => $this->videos->duration,
                'course_id' => $this->videos->course_id,
                'sequence' => $this->videos->sequence,
                'uploaded_by' => $this->videos->uploded_by,
                'created_at' => $this->videos->created_at,
                'updated_at' => $this->videos->updated_at
            ],
            'progress' => $this->progress,
            'completed' => $this->completed,
            'timeago' => Carbon::parse($this->created_at)->diffForHumans(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
