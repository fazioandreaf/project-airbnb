<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    $services=[
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
        'wifi',
    ];
    $index= $faker -> unique() -> numberBetween(0,9);
    $service= $services[$index] ;
    // dd($service);

    return [

        'service'=>$service,

    ];
});
