<?php

namespace App\Http\Requests\Api\Clients\Auth;

use App\Http\Requests\Api\AbstractRequest;

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
            'city_id'=>'required|exists:cities,id',
        ];
    }

    public function requestAttributes(){
        return [
            'name',
            'email',
            'password',
            'mobile',
            'city_id',
            'logo',
            ];
    }
}
