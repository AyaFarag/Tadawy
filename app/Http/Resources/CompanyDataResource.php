<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompanyDataResource extends JsonResource
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
            'name' => $this->name,
            'email' => $this->email,
            'description' => $this->description,
            'country' => $this->city->country->only('id', 'name'),
            'city' => $this->city->only('id','name'),
            'meta_data' => new CompanyMetaDataResource($this -> meta),
            'category' => $this->specialization->category->only('id','name'),
            'specialization' => $this->specialization->only('id','name'),
            'average_rating' => (float) $this->companyRatings()->avg('rate') ?? 0,
            'comments_count' => $this->companyComments()->count(),
            'views' => $this->views
        ];
    }
}
