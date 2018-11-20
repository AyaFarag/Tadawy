<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyMetaDataResource extends JsonResource
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
            'website' => $this->website,
            'images'=> $this->images,
            'logo' => $this->logo,
            'social_networks'=> $this->social_networks
        ];
    }
}
