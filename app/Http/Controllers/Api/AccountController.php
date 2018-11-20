<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Events\PhoneActivationRequest;
use App\Events\EmailActivationRequest;
use App\Events\PasswordResetRequest;
use App\Models\Api\User;

use App\Http\Requests\Api\ForgotPasswordRequest;

use Auth;

class AccountController extends Controller
{
    public function send(Request $request) {
        $request -> validate(['phone' => 'required|regex:/^[+\d]+$/']);

        $user = Auth::user();
        $phone = $request -> input('phone');
        // check if the user is trying to confirm an already confirmed number
        if ($user -> confirmed_phone && $user -> phone === $phone) {
            return response()
                -> json([
                    'message' => trans('api.Already confirmed')
                ], 403);
        }

        $user -> phone = $phone;
        $user -> confirmed_phone = 0;
        event(new PhoneActivationRequest($user));

        return response()
            -> json([
                'message' => trans('api.Sent successfully')
            ], 200);
    }

    public function activate(Request $request) {
        $request -> validate([ 'code' => 'required|min:4|max:4' ]);

        $user = Auth::user();
        $activated = 0;

        if ($user -> phone_confirmation_code === $request -> input('code')) {
            $user -> phone_confirmation_code = null;
            $user -> confirmation_code = null;
            $user -> confirmed_phone = 1;
            $user -> status = 1;
            $user -> save();

            return response()
                -> json([
                    'message' => trans('api.Activated successfully')
                ], 200);
        }


        return response()
            -> json([
                'message' => trans('api.Code does not match')
            ], 403);
    }

    public function sent() {
        return is_null(Auth::user() -> phone_confirmation_code) ? 0 : 1;
    }


    public function sendEmail() {
        $user = Auth::user();
        event(new EmailActivationRequest($user));

        return response()
            -> json([
                'message' => trans('api.Sent successfully')
            ], 200);
    }

    public function activated() {
        return Auth::user() -> status;
    }

    public function sendPasswordResetToken(ForgotPasswordRequest $request)
    {
        $user = User::where('email', $request -> input('email')) -> first();

        event(new PasswordResetRequest($user));

        return response() -> json([
            'error' => trans('api.Sent successfully')
        ]);
    }
}