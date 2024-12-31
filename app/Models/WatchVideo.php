<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WatchVideo extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'video_id',
        'progress',
        'completed'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function videos(): BelongsTo
    {
        return $this->belongsTo(Video::class, 'video_id');
    }
}