<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sponsor;
use Faker\Generator as Faker;

$factory->define(Sponsor::class, function (Faker $faker) {
    $duration=[24,72,144];
    $price=[299,599,999];
    // public function(){

    // }
    return [
    ];
});
