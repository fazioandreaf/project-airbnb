<?php

use Illuminate\Database\Seeder;
use App\SponsoredApartment;
use App\Apartment;
use App\Sponsor;
class SponsoredApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    factory(SponsoredApartment::class,50)->make()->each(function($sponsored){
                $apartment=Apartment::inRandomOrder()->first();
                $sponsor=Sponsor::inRandomOrder()->first();

                $sponsored->apartment()->associate($apartment);
                $sponsored->sponsor()->associate($sponsor);
                $sponsored->save();
    });
    }}
