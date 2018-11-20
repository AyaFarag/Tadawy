<?php

namespace App\Http\Requests\Api\Companies;

use Illuminate\Foundation\Http\FormRequest;

class ReservationRequest extends FormRequest
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
            'comment' => 'string',
            'email' => 'email'
        ];
    }

     public function requestAttributes()
    {
        return [
            'comment',
            'email',
            'name',
            'phone'
        ];
    }
}
