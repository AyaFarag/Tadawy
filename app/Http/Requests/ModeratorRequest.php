<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ModeratorRequest extends FormRequest
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

        if ($this -> isMethod('put') || $this -> isMethod('patch')) {
            return [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:admins,email,' . $this -> moderator -> id,
                'password' => 'required|min:6|confirmed'
            ];
        }

        return [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:6|confirmed'
        ];

    }
}
