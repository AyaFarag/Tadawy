<?php

use Faker\Generator as Faker;
use App\Models\Api\User as User;
use App\Models\Rating as Rating;

$factory->define(Rating::class, function (Faker $faker) {
    return [
        'rate' => rand(1, 5),
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
        'client_id' => function () {
            if (User::where('role', User::CLIENT_ROLE) -> count() < 1) {
                return factory(User::class)
                    -> create(['role' => User::CLIENT_ROLE])
                    -> id;
            } else {
                return User::inRandomOrder()
                    -> first()
                    -> id;
            }
        }
    ];
});
