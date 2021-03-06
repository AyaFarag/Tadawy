<?php

use Faker\Generator as Faker;

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

$factory->define(App\Models\Company::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => bcrypt('123456789'),
        'description' => $faker->text(100),
        'status' => false,
        'country_id' => 1,
        'city_id' => 1,
        'category_id' => 1,
        'specialization_id' => 1,
        'api_token' => str_random(60),
        'device_token' => str_random(60),
        'phone' => $faker->phoneNumber
    ];
});
