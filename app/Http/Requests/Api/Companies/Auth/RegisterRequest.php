<?php

namespace App\Http\Requests\Api\Companies\Auth;

use App\Http\Requests\Api\AbstractRequest;
use App\Models\Api\User as Company;

class RegisterRequest extends AbstractRequest
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
            'name'=>'required|max:191',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed',
            'mobile'=>'required|unique:users',
            'description' => 'string',
            'city_id'=>'required|exists:cities,id',
            'specialization_id'=>'required|exists:specializations,id',
            'website' => 'string',
            'type' => 'required|in:'.$this->getCompanyTypes(),
            'logo' => 'url',
            'license_image' => 'url',
            'images' => 'array',
            'social_networks' => 'array',
            'insurance_companies' => 'array',
            'address' => 'string'
            
        ];
    }

    public function requestAttributes(){
        return [
            'name',
            'email',
            'password',
            'phone',
            'description',
            'city_id',
            'specialization_id',
            'website',
            'license_image',
            'images',
            'social_networks',
            'logo',
            'insurance_companies',
            'address'
        ];
    }

    public function getCompanyTypes(){
        $types = array_keys(Company::getCompanyType());
                return implode(',',$types);
    }
}
