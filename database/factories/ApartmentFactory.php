<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker ->sentence,
        'rooms' => $faker ->word,
        'bed' => rand(1,4),
        'bathroom' => rand(0,2),
        'area' => $faker ->numberBetween(1,9999)*0.01,
        'address' => $faker ->address,
        'url_img' => $faker ->imageUrl(800, 600,'city'),
        'features' => $faker ->word,
    ];
});
