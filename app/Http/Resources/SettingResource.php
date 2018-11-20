<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SettingResource extends JsonResource
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
            'social_network' => $this->social_network,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address
        ];
    }
}
