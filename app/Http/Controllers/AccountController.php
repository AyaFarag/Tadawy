<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Api\User;
use App\Models\PasswordReset;

use App\Events\AccountActivated;

use Carbon\Carbon;
use Validator;


class AccountController extends Controller
{
    public function activate(Request $request) {
        $validator = Validator::make(
            $request->all(),
            ['token' => 'required|exists:users,confirmation_code']
         );

        if ($validator -> fails()) {
            return view('activate')
                -> withErrors($validator);
        }

        $token = $request -> input("token");

        $user = User::where('confirmation_code', $token) -> first();

        $user -> status = 1;
        $user -> confirmation_code = null;
        $user -> save();

        // Send account "activated successfully" notification
        // event(new AccountActivated($user));

        return view('activate');
    }

    public function showResetPasswordForm(Request $request) {
        $request -> validate([ "token" => "required" ]);

        $reset = PasswordReset::where("token", $request -> input("token"))
            -> where(
                "updated_at",
                ">",
                Carbon::now()
                    -> subHours(1)
                    -> toDateTimeString()
            )
            -> first();

        if (is_null($reset)) {
            return view("password-reset", [ "status" => "invalid" ]);
        }

        return view("password-reset", [
            "status" => "valid",
            "token" => $request -> input("token")
        ]);
    }

    public function resetPassword(Request $request) {

        $request -> validate([ "password" => "required|min:6|confirmed" ]);

        $reset = PasswordReset::where("token", $request -> input("token"))
            -> where(
                "updated_at",
                ">",
                Carbon::now()
                    -> subHours(1)
                    -> toDateTimeString()
            )
            -> first();
        if (is_null($reset)) {
            return abort(404);
        }

        $user = User::where("email", $reset -> email) -> first();

        $user -> password = $request -> input("password");
        $user -> save();

        $reset -> delete();

        return view("password-reset-success");
    }
}
