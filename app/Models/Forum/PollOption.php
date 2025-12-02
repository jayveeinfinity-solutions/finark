<?php

namespace App\Models\Forum;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollOption extends Model
{
    protected $fillable = [
        'poll_id',
        'option_text',
        'votes_count',
    ];

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function votes(): HasMany
    {
        return $this->hasMany(PollVote::class, 'option_id');
    }
}
