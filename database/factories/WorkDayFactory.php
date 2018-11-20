<?php

use Faker\Generator as Faker;
use App\Models\Api\User;
use App\Models\WorkDay;

$factory->define(WorkDay::class, function (Faker $faker) {
    return [
        'day' => $faker->dayOfWeek(),
        'from' => $faker->time($format = 'H:i:s'),
        'to' => $faker->time($format = 'H:i:s'),
        'shift' => 'night',
        'company_id' => function () {
            if (User::where('role', User::COMPANY_ROLE) -> count() < 1) {
                return factory(User::class)
                    -> create(['role' => User::COMPANY_ROLE])
                    -> id;
            } else {
                return User::inRandomOrder()
                    -> first()
                    -> id;
            }
        }
    ];
});