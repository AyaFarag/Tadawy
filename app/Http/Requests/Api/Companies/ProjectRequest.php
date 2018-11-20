<?php

namespace App\Http\Requests\Api\Companies;

use App\Http\Requests\Api\AbstractRequest;

class ProjectRequest extends AbstractRequest
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
                'name'=>'required|string',
                'description' => 'required|string',
                'address'=>'required|string',
                'images'=>'required|array',
            ];
    }
    public function requestAttributes()
    {
        return [
            'name',
            'description',
            'address',
            'images',
        ];
    }
}
