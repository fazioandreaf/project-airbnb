<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker ->sentence,
        'rooms' => $faker ->word,
        'bed' => rand(1,4),
        'bathroom' => $faker ->word,
        'area' => $faker ->numberBetween(1,100000),
        'address' => $faker ->word,
        'url_img' => $faker ->word,
        'features' => $faker ->word,
    ];
});
