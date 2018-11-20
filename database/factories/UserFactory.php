<?php

use Faker\Generator as Faker;
use App\Models\Api\User;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456789'), // secret
        'mobile' => $faker->phoneNumber,
        'role' => User::CLIENT_ROLE,
        'status' => false,
        'confirmed_phone' => false,
        'city_id' => 1,
        'specialization_id' => 1,
        'api_token' => str_random(60),
        'device_token' => str_random(60),
        'logo' => $faker->image,

    ];
});