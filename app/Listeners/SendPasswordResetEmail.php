<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\Models\PasswordReset;
use App\Mail\PasswordResetMail;

use Mail;

class SendPasswordResetEmail
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $user = $event -> user;

        $oldReset = PasswordReset::where("email", $user -> email) -> first();
        $token = str_random(40) . time() . $user -> id;

        if ($oldReset) {
            $oldReset -> token = $token;
            $oldReset -> save();
        } else {
            PasswordReset::create([
                "token" => $token,
                "email" => $user -> email
            ]);
        }

        Mail::to($user)
            -> send(new PasswordResetMail(route('password-reset', [ 'token' => $token ])));
    }
}
