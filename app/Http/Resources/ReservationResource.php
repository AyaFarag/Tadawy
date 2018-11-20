<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'company_id' => $this->company_id,
            'name' =>  $this->name ?? $this->user->name,
            'phone' =>  $this->phone ?? $this->user->phone,
            'email' =>  $this->email ?? $this->user->email,
            'comment' => $this->comment,
            'status' => $this->status,
            'date' => $this->date,
            'time' => $this->time,
        ];
    }
}
