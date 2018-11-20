<?php

namespace App\Http\Controllers\Api\Clients;

use Illuminate\Http\Request;
use App\Http\Requests\Api\Clients\Auth\RegisterRequest;
use App\Http\Requests\Api\Clients\Auth\LoginRequest;
use App\Http\Controllers\Controller;
use App\Models\Api\User as Client;
use Illuminate\Auth\Events\Registered;
use App\Http\Resources\UserResource;


class RegisterController extends Controller
{

    public function register(RegisterRequest $request, Client $client)
    {
        $client->fill($request->input());
        $client->role = Client::CLIENT_ROLE;
        $client->api_token = str_random(60);
        if($client->save())
        {
            
            event(new Registered($client));
            return new UserResource($client);
        }else{
            return response()->json([
                'error' => trans('api.Errors occured')
            ], 500);
        }
    }

    public function confirm(Request $request)
    {
        $client = auth('clients_api')->user();
        if($request->code == $client->phone_confirmation_code){
            $client->confirmed_phone = 1;
            $client->save();
            return response()->json([
                'message'=>trans('api.Phone activated successfully')
            ],200);
        }else{
            return response()->json([
                'message'=>trans('api.Code does not match')
            ],403);
        }
    }
    /*public function checkActivation()
    {
        return ['message'=>auth('carowner_api')->user()->confirmed];
    }
    public function logout() {
        $user = auth('carowner_api')->user();
        $user->api_token = null;
        $user->save();
        return response()->json([
                'message'=>trans('logout successfully')
            ],200);
     }*/
}
