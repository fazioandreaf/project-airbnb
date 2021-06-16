<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Statistic;
use Faker\Generator as Faker;

$factory->define(Statistic::class, function (Faker $faker) {
    return [
        'views' => $faker->numberBetween($min = 1, $max = 2000),
        'messages' =>$faker->numberBetween($min = 1, $max = 2000)
    ];
});
