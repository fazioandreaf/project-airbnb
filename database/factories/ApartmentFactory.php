<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker ->sentence,
        'rooms' => $faker ->word,
        'bed' => rand(1,4),
        'bathroom' => $faker ->rand(0,2),
        'area' => $faker ->numberBetween(1,100000),
        'address' => $faker ->address,
        'url_img' => $faker ->imageUrl($width = 640, $height = 480),
        'features' => $faker ->word,
    ];
});
