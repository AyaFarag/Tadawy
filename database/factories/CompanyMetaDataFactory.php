<?php

use Faker\Generator as Faker;
use App\Models\Api\User as User;
use App\Models\CompanyMetaData as CompanyMetaData;

$factory->define(CompanyMetaData::class, function (Faker $faker) {
    return [
        'website' => $faker->domainName,
        'license_image' => $faker->url,
        'images' => [$faker->url],
        'social_networks' => ['facebook' => $faker->url, 'twitter' => $faker -> url],
        'company_id' => function () {
            if (User::where('role', User::COMPANY_ROLE) -> count() < 1) {
                return factory(User::class)
                    -> create(['role' => User::COMPANY_ROLE])
                    -> id;
            } else {
                return User::where('role', User::COMPANY_ROLE)
                    -> inRandomOrder()
                    -> first()
                    -> id;
            }
        }
    ];
});
