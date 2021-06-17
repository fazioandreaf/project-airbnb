<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'sponsor_duration' => rand(24,144),
        'price' => rand(24,144)
    ];
});
