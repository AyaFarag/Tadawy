<?php

namespace App\Http\Requests\Api\Companies;

use App\Http\Requests\Api\AbstractRequest;
use App\Models\Api\User as Company;
use App\Models\Ad;

class AdRequest extends AbstractRequest
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
            'title'=>'required',
            'content' => 'required|string',
            'city_id'=>'required|exists:cities,id',
            'duration'=>'required|in:'.$this->getDurationsAsString(),
        ];
    }
    public function requestAttributes()
    {
        return [
            'title',
            'content',
            'city_id',
            'duration',
            'image',
        ];
    }
    public function getDurationsAsString(){
        $durations = array_keys(Ad::$durations);
        return implode(',',$durations);
    }
}
