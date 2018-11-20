<?php

use Faker\Generator as Faker;
use App\Models\Api\User as User;
use App\Models\Reservation as Reservation;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'user_id' => function () {
            if (User::where('role', User::CLIENT_ROLE) -> count() < 1) {
                return factory(User::class)
                    -> create(['role' => User::CLIENT_ROLE])
                    -> id;
            } else {
                return User::inRandomOrder()
                    -> first()
                    -> id;
            }
        },
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
        },
        'status' => 1,
        'date' => $faker->date,
        'time' => $faker->time,
    ];
});
