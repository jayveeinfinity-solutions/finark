<?php

namespace App\Models\Forum;

use App\Models\Forum\Reaction;
use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $fillable = ['post_id'];

    public function attachments()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
