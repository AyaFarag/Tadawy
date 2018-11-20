<?php

namespace App\Http\Requests\Api\Clients;

use Illuminate\Foundation\Http\FormRequest;

class CommentRequest extends FormRequest
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
            'company_id'=>'required|exists:users,id',
            'comment'=>'required|string',
            'rating'=>'required|numeric|min:1|max:5'
        ];
    }

    public function requestAttributes()
    {
        return [
            'company_id',
            'comment',
            'rating'
        ];
    }
}
