<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;


class SendPhoneActivationCode
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

        $confirmationCode = join('', array_map(function($value) { return mt_rand(0, 9); }, range(1, 4)));
        $user -> phone_confirmation_code = $confirmationCode;
        $user -> save();

        // send_sms($user -> phone, $confirmationCode);
    }
}
