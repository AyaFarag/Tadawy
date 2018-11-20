<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Requests\Api\Clients\Auth\LoginRequest;
use App\Http\Requests\Api\ChangePasswordRequest;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\UserResource;
use App\Models\Api\User;

class LogController extends Controller
{

     public function login(LoginRequest $request)
    {
        if(auth()->attempt( $request->only('email','password')))
        {
            $client = auth()->user();
            $client->api_token = str_random(60);
            $client->device_token = $request->device_token;
            $client->save();
            return new UserResource($client);
        }
        return response()->json([
            'error' => trans('auth.failed')
        ], 401);
    }

    public function check($attribute, Request $request)
    {
        return User::where($attribute,$request->get($attribute))->take(1)->count();
    }
    public function changePassword(ChangePasswordRequest $request){
        $user = auth()->user();
        if(\Hash::check($request->input('old_password'), $user->password)){
            $user->password = $request->input('password');
            $user->save();
             return response()->json([
            'message' => 'api.Password changed successfully'
        ], 200);
        }
        return response()->json([
            'error' => 'Invalid password'
        ], 401);
    }
}
