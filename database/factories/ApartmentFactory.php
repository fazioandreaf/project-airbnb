<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Apartment;
use Faker\Generator as Faker;

$factory->define(Apartment::class, function (Faker $faker) {
    return [
        'title' => $faker->safeColorName.' of '.$faker->citySuffix,
        'number_rooms' => rand(1,3),
        'number_toiletes' => rand(1,3),
        'number_beds' => rand(1,4),
        'area' => rand(15,100),
        'address' => $faker->streetName.'-'.$faker->buildingNumber.'-'.$faker->city,
        'latitude' => $faker->latitude($min=-50,$max=50),
        'longitude' => $faker->longitude($min=-50,$max=50),
        'cover_image' => $faker->imageUrl(800,600, 'city'),
    ];
});
