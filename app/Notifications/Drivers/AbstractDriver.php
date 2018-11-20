<?php

namespace App\Notifications\Drivers;

abstract class AbstractDriver
{
    protected $device_token;
    protected $body;
    protected $title;
    protected $data;

    abstract public function send();

    public function setTitle($value)
    {
        $this->title = $value;
    }
    public function setDeviceToken($value)
    {
        $this->device_token = $value;
    }
    public function setBody($value)
    {
        $this->body = $value;
    }
    public function setData($value)
    {
        $this->data = $value;
    }
}

