<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content'];

    public function feed()
    {
        return $this->morphOne(Feed::class, 'feedable');
    }

    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
