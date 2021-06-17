<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use App\Apartment;

class SponsorSeeder extends Seeder
{
    public function run()
    {

        factory(Sponsor::class,3)->create()->each(function ($sponsor) {

            $timestamp = mt_rand(1609455600, time());
            $randomDate = date("d-m-Y", $timestamp);
            $test = "Sono un pirla";

            $apartments = Apartment::inRandomOrder()->limit(2)->get();
            $sponsor->apartments()->attach($apartments, ['start_date' => $randomDate, 'expire_date' => $test]);
            $sponsor->save();
        });
    }
}
