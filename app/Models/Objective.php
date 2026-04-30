<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    protected $fillable = ['user_id', 'quarter', 'year', 'title', 'strategy_reflection', 'status'];

    protected $appends = ['progress_percentage', 'health_status'];

    public function keyResults()
    {
        return $this->hasMany(KeyResult::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getProgressPercentageAttribute()
    {
        if ($this->keyResults->count() === 0) {
            return 0;
        }

        $totalProgress = $this->keyResults->reduce(function ($carry, $kr) {
            $progress = ($kr->target_value > 0) ? ($kr->current_value / $kr->target_value) * 100 : 0;
            return $carry + min(100, $progress);
        }, 0);

        return round($totalProgress / $this->keyResults->count(), 2);
    }

    public function getHealthStatusAttribute()
    {
        // Simple logic: if progress is less than 25% * current month in quarter, it's at risk
        $currentMonthInQuarter = (now()->month - 1) % 3 + 1; // 1, 2, or 3
        $expectedProgress = ($currentMonthInQuarter / 3) * 100;
        
        // Threshold: 10% buffer
        if ($this->progress_percentage < ($expectedProgress - 10)) {
            return 'At Risk';
        }

        return 'On Track';
    }
}
