<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LandLord;
use Faker\Generator as Faker;

$factory->define(LandLord::class, function (Faker $faker) {
    return [
        'email' => $faker -> email,
        'password' => $faker -> password,
        'firstname' => $faker -> firstName,
        'lastname' => $faker -> lastName,
        'date_of_birth' => $faker -> date,
    ];
});
