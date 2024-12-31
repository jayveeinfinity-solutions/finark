<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Carbon\CarbonInterval;
use App\Http\Resources\VideoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'poster' => $this->poster,
            'tag' => $this->tag,
            'visibility' => $this->visibility,
            'timeago' => Carbon::parse($this->created_at)->diffForHumans(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => [
                'id' => $this->users->id,
                'name' => $this->users->name
            ],
            'videos' => VideoResource::collection($this->videos),
            'seconds' => VideoResource::collection($this->videos)->sum('duration'),
            'time_humans' => $this->videos->count() ? CarbonInterval::seconds(VideoResource::collection($this->videos)->sum('duration'))->cascade()->forHumans(null, true) : '--'
        ];
    }
}
