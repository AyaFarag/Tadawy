<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'id'=>$this->id,
            'title'=>$this->title,
            'content'=>$this->content,
            //'country'=>$this->city->country->name,
            //'city'=>$this->city->name,
            'image'=>$this->image,
            'status'=>$this->status,
            'accepted'=>!is_null($this->accepted_at),
        ];
    }
}
