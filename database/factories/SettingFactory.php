<?php

use Faker\Generator as Faker;
use App\Models\Setting as Setting;

$factory->define(Setting::class, function (Faker $faker) {
    return [
        'social_network' => [
        	'facebook' => 'https://www.facebook.com/yourpage',
        	'twitter' => 'https://www.twitter.com/yourpage'
        ],
        'email' => $faker -> email,
        'phone' => $faker -> phoneNumber,
        'address' => $faker -> streetAddress
    ];
});
