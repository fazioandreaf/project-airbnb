<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Message;
use Faker\Generator as Faker;

$factory->define(Message::class, function (Faker $faker) {
    $gender = $faker->randomElement(['male','female']);

    return [
        'email' => $faker->email,
        'sent_date' => $faker->date('Y-n-d',$max='now'),
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'text_message' => $faker->sentence,
    ];
});
