<?php


function send_sms($number,$code)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,"http://www.jawalbsms.ws/api.php/sendsms");
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS,"user=".config('jawalbsms.user')."&pass=".config('jawalbsms.password')."&to=".$number."&message=".$code."&sender=Amaar");
    // receive server response ...
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $server_output = curl_exec ($ch);

    curl_close ($ch);
    return $server_output;
}