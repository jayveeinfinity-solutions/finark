<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Models\WatchVideo;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'active' => $this->active,
            'remember_token' => $this->remember_token,
            'timeago' => Carbon::parse($this->created_at)->diffForHumans(),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'watch_videos' => WatchVideoResource::collection($this->watchVideos)
        ];
    }
}
