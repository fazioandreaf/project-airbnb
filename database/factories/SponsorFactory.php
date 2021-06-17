<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {

    return [
        // 'sponsor_duration' => $faker->randomElement([24,72,144]),
        // 'price' => $faker->randomElement([299,599,999])
    ];
});
