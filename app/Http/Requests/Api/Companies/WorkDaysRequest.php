<?php

namespace App\Http\Requests\Api\Companies;

use App\Http\Requests\Api\AbstractRequest;

use Illuminate\Validation\Rule;

class WorkDaysRequest extends AbstractRequest
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
            'days' => 'required|array',
            'days.*.day'=> 'required|string|in:saturday,sunday,monday,tuesday,wednesday,thursday,friday',
            'days.*.from' => 'required|string',
            'days.*.to'=>'required|string',
            'days.*.shift'=>'required|string|in:night,morning',
        ];
    }
    public function requestAttributes()
    {
        return [
            'days'
        ];
    }
}
