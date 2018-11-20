<?php

use Faker\Generator as Faker;
use App\Models\Country as Country;
use App\Models\City as City;

$factory->define(City::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'country_id' => function () {
            if (Country::count() < 1) {
                return factory(Country::class)->create()->id;
            } else {
                return Country::inRandomOrder()->first()->id;
            }
        }
    ];
});
