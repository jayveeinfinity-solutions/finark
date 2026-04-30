<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KeyResult extends Model
{
    protected $fillable = ['objective_id', 'title', 'target_value', 'current_value', 'format_type'];

    protected $appends = ['completion_percentage'];

    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }

    public function getCompletionPercentageAttribute()
    {
        if ($this->target_value <= 0) {
            return 0;
        }

        return round(min(100, ($this->current_value / $this->target_value) * 100), 2);
    }
}
