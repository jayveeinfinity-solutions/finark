<?php

namespace App\Models;

use App\Models\Client;
use App\Models\ServicePlan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    
    protected $table = 'appointments';

    public function clients(): BelongsTo
    {
        return $this->belongsTo(Client::class, 'client_id');
    }

    public function service_plans(): BelongsTo
    {
        return $this->belongsTo(ServicePlan::class, 'service_plan_id');
    }

    public function users(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
