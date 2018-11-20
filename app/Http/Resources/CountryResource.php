<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CountryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {//dd($this->cities[0]);
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'cities'=> $this->cities ? CityResource::collection($this->cities) : $this->cities,
        ];
    }
}
