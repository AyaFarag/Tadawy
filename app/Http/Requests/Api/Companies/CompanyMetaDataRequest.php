<?php

namespace App\Http\Requests\Api\Companies;

use App\Http\Requests\Api\AbstractRequest;

class CompanyMetaDataRequest extends AbstractRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'website' => 'string',
            'license_image'=>'url',
            'images'=>'array',
            'images.*'=>'url',         
            'social_networks'=>'array',
            'name'=>'max:191',
            'description' => 'string',
            'address'=>'required',
            'city_id'=>'exists:cities,id',
            'country_id'=>'required_with:city_id|exists:countries,id',
            'specialization_id'=>'exists:specializations,id',
        ];
    }
    public function requestAttributes()
    {
        return [
            'website',
            'license_image',
            'images',
            'social_networks',
            'name',
            'description',
            'address',
            'city_id',
            'country_id',
            'specialization_id'
        ];
    }
}
