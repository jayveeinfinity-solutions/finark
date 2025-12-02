<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Section extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'order'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function comments(): HasManyThrough
    {
        return $this->hasManyThrough(
            Comment::class,
            Post::class,
            'section_id',
            'post_id',
            'id',
            'id'
        );
    }

    public function latestPost(): HasOne
    {
        return $this->hasOne(Post::class)->latestOfMany();
    }

    public function latestComment()
    {
        return $this->comments()->latest()->first();
    }
}
