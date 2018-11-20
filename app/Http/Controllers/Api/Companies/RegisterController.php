<?php

namespace App\Http\Controllers\Api\Companies;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Companies\Auth\RegisterRequest;
use App\Http\Requests\Api\Companies\Auth\LoginRequest;
use App\Models\Api\User as Company;
use App\Http\Resources\UserResource;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{

    public function register(RegisterRequest $request, Company $company)
    {

        $company->fill($request->input());
        $company->role = Company::COMPANY_ROLE;
        $company->api_token = str_random(60);
        if($company->save())
        {
            $company->meta()->create($request -> all());
            event(new Registered($company));
            return new UserResource($company);
        }else{
            return response()->json([
                'error' => trans('api.Errors occured')
            ], 500);
        }
    }
}
