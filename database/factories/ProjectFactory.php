<?php

use Faker\Generator as Faker;
use App\Models\Api\User as User;
use App\Models\Project as Project;

$factory->define(Project::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->sentences(3, true),
        'address' => $faker->streetAddress,
        'images' => [$faker->url],
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
