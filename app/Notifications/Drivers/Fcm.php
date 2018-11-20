<?php

namespace App\Notifications\Drivers;
use App\Notifications\Drivers\AbstractDriver;
class Fcm extends AbstractDriver
{

    public function __construct($device_token=NULL,$title=NULL,$body=NULL,$data=NULL,$options = [])
    {
        $this->device_token = $device_token;
        $this->title = $title;
        $this->body = $body;
        $this->data = $data;
        $this->options = $options;
    }

    public function send()
    {
        $fields = [
            'notification'  => [
                "title"=>$this->title,
                "body"=>$this->body
            ],
            'to' => $this->device_token
        ];
        if(!empty($this->options)){
            $fields['notification'] = $fields['notification'] +$this->options;
        }
        if($this->data){
            $fields =$fields+["data"=>$this->data];
        }

        $headers = [
            'Authorization: key='.env('FCM_SERVER_KEY'),
            'Content-Type: application/json',
        ];
        $ch = curl_init();
        curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
        curl_setopt( $ch,CURLOPT_POST, true );
        curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
        curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
        curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
        $result = curl_exec($ch );
        curl_close( $ch );
        return $result;
    }
}

