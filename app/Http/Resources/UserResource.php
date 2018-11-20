<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Models\Api\User;
use Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'role' => $this->role,
            'country' => $this->city->country->only('id', 'name'),
            'city' => $this->city->only('id','name'),
            'status' => $this->status ? true : false,
            'confirmed_phone' => isset($this->confirmed_phone),
            'token' => $this->api_token,
            'device_token' => $this->device_token,
            'logo' => $this->image
        ];

        if ($this -> role === User::COMPANY_ROLE) {
            $data = array_merge($data, [
                'meta_data' => array_merge(
                    (new CompanyMetaDataResource($this->meta)) -> toArray($request),
                    ['license_image' => $this->meta->license_image]
                ),
                'category' => $this->specialization->category->only('id','name'),
                'specialization' => $this->specialization->only('id','name'),
                'average_rating' => (float) $this->companyRatings()->avg('rate') ?? 0,
                'comments_count' => $this->companyComments()->count(),
                'views' => $this->views,
                'projects' => ProjectResource::collection($this->projects)
            ]);
        }

        return $data;
    }
}
