<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Course extends Model
{
    use HasFactory;
    
    protected $table = 'courses';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'poster',
        'description',
        'tag',
        'visibility',
        'created_by'
    ];

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function videos(): HasMany {
        return $this->hasMany(Video::class, 'course_id', 'id')->orderBy('sequence');
    }
}