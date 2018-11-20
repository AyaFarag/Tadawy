<?php

use Faker\Generator as Faker;

use App\Models\Pages;

$factory->define(Pages::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'content' => $faker->text
    ];
});
