<?php

use Faker\Generator as Faker;
use App\Models\Contacts as Contacts;

$factory->define(Contacts::class, function (Faker $faker) {
    return [
        'address' => $faker -> streetAddress,
        'phone' => $faker -> phoneNumber,
        'email' => $faker -> email
    ];
});
