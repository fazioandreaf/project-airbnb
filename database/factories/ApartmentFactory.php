<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'number_rooms' => $rand(1,3),
        'number_toiletes' => $rand(1,3),
        'number_beds' => $rand(1,4),
        'area' => $rand(15,100),
        'address' => $faker->word,
        'latitude' => $faker->word,
        'longitude' => $faker->word,
        'cover_image' => $faker->word,
    ];
});
