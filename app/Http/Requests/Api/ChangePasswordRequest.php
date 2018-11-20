<?php

namespace App\Http\Requests\Api;

use App\Http\Requests\Api\AbstractRequest;

class ChangePasswordRequest extends AbstractRequest
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
            'old_password'=>'required',
            'password'=>'required|min:8|confirmed',
        ];
    }
    public function requestAttributes(){
        return [
            'old_password',
            'password'
            ];
    }
}
