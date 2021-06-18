<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $services=[
        'wifi',
        'Cucina',
        'TV',
        'Lavatrice',
        'Asciugacapelli',
        'Forno a microonde',
        'Frigorifero',
        'Aria condizionata',
        'Allarme antincendio',
    ];
    $index= $faker -> unique() -> numberBetween(0,8);
    $service= $services[$index];

    return [

        'service'=>$service,

    ];
});
