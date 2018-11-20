<?php

namespace App\Http\Requests\Api\Companies;

use App\Http\Requests\Api\AbstractRequest;

class SubscriptionRequest extends AbstractRequest
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
            'plan_id' => 'required|exists:plans,id',
            'company_id' => 'unique:subscriptions'
        ];
    }

    protected function prepareForValidation() {
        $this -> merge(['company_id' => auth() -> user() -> id]);
    }

    public function requestAttributes()
    {
        return [
            'plan_id'
        ];
    }
}
