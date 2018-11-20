<?php

namespace App\Http\Requests\Api\Clients;

use Illuminate\Foundation\Http\FormRequest;
use App\Http\Requests\Api\AbstractRequest;

class RatingRequest extends AbstractRequest
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
            'rate'=>'required|integer|max:5|min:0'
        ];
    }
    public function requestAttributes()
    {
        return [
            'company_id',
            'rate'
        ];
    }
}
