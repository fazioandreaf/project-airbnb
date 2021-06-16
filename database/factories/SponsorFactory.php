<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    return [
        'views' => $faker -> numberBetween(10,100),
        'messages' => $faker ->word,
    ];
});
