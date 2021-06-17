<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Statistic;
use Faker\Generator as Faker;

$factory->define(Statistic::class, function (Faker $faker) {
    return [
        'number_views'=> rand(10,100),
        'number_messages'=> rand(10,100),
    ];
});
