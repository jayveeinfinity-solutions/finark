<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use App\Helpers\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'client' => [
                'id' => $this->clients->id,
                'name' => $this->clients->name,
                'email' => $this->clients->email,
                'message' => $this->client_message
            ],
            'service_plan' => [
                'id' => $this->service_plans->id,
                'name' => $this->service_plans->name,
                'slug' => $this->service_plans->slug,
            ],
            'user' => $this->user_id ? [
                'id' => $this->users->id,
                'name' => $this->users->name,
                'email' => $this->users->email
            ] : NULL, 
            'appointment_date' => $this->appointment_date,
            'appointment_time' => $this->appointment_time,
            'date' => Carbon::parse($this->appointment_date)->format('F d, Y'),
            'time' => Helper::meetingTime($this->appointment_time),
            'status' => $this->status,
            'notes' => $this->notes,
            'employee_notes' => $this->employee_notes,
            'assigned_by' => $this->assigned_by
        ];
    }
}
