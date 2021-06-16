<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'rooms' => $faker->numberBetween($min = 1, $max = 10),
        'beds' => $faker->numberBetween($min = 1, $max = 20),
        'bathrooms' => $faker->numberBetween($min = 1, $max = 5),
        'area' => $faker->rand(1,100),
        'address' => $faker->address,
        'img' => $faker->word,
        'services' => $faker->word
    ];
});
