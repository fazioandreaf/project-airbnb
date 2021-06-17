<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male','female']);
    return [
        'email' => $faker -> mail,
        'password' => $faker -> password,
        'firstname' => $faker -> firstName,
        'lastname' => $faker -> lastName,
        'date_of_birth' => $faker -> date,
    ];
});
