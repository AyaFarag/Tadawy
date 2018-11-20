<?php

use Faker\Generator as Faker;
use App\Models\Api\User as User;
use App\Models\Comment as Comment;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->sentences(3, true),
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
