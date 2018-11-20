<?php

use Faker\Generator as Faker;

use App\Models\Ad;

$factory->define(Ad::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text,
        'image' => $faker->url,
        'duration' => '1',
        'city_id' => 1,
    ];
});
