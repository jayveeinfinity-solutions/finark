<?php

namespace App\Http\Resources\Forum;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SectionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $latestPost = $this->latestPost;
        $latestComment = $this->latestComment();

        $lastActivity = $latestComment ?? $latestPost;

        $iconClass = match($this->slug) {
            'announcements' => 'text-danger',
            'breakfast-club' => 'text-success',
            'seminars-workshops' => 'text-primary',
            'training-development' => 'text-warning',
            default => 'text-secondary',
        };

        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'icon' => $this->icon,
            'icon_class' => $iconClass,
            'order' => $this->order,

            'threads_count' => $this->threads_count ?? 0,
            'replies_count' => $this->replies_count ?? 0,

            'last_activity_at' => $lastActivity?->created_at,
            'last_activity_user' => $lastActivity?->user?->only('id', 'name')
        ];
    }
}
