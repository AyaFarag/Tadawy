<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Notifications\Drivers\Fcm;

class SendNotification
{

    
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $notification = $event -> notification;

        $fcm = new Fcm($notification["device_token"]);
        $fcm -> setTitle($notification["title"]);
        $fcm -> setBody($notification["body"]);
        if (array_key_exists("data", $notification["data"])) {
            $fcm -> setData($notification["data"]);
        }
        $fcm -> send();
    }
}
