<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

abstract class AbstractRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    abstract public function authorize();

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    abstract public function rules();

    abstract public function requestAttributes();

    public function inputs()
    {
        return $this->only($this->requestAttributes());
    }

    public function without($key)
    {
        $inputs = $this->inputs();
        if (array_key_exists($key, $inputs)) {
            unset($inputs[$key]);
        }
        return $inputs;
    }
}
