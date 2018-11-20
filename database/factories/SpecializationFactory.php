<?php

use Faker\Generator as Faker;
use App\Models\Category as Category;
use App\Models\Specialization as Specialization;

$factory->define(Specialization::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'category_id' => function () {
            if (Category::count() < 1) {
                return factory(Category::class)->create()->id;
            } else {
                return Category::inRandomOrder()->first()->id;
            }
        }
    ];
});
