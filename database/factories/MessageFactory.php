<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male','female']);

    return [
        'email' => $faker->email,
        'sent_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'firstname' => $faker->firstName($gender),
        'lastname' => $faker->lastName,
        'text' => $faker->sentence
    ];
});
