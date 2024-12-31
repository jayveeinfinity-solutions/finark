<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Video extends Model
{
    use HasFactory;
    
    protected $table = 'videos';

    protected $fillable = [
        'uid',
        'name',
        'slug',
        'filename',
        'duration',
        'course_id',
        'visibility',
        'uploaded_by'
    ];

    public function courses(): BelongsTo
    {
        return $this->belongsTo(Course::class, 'course_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'uploaded_by');
    }

    public function watchers(): HasMany
    {
        return $this->hasMany(WatchVideo::class, 'video_id', 'id');
    }
}
