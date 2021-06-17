<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\LandLord;
use App\Service;
use App\Sponsor;
use App\Statistic;


class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class, 50)->make()->each(function ($apartment) {
                $landlord = LandLord::inRandomOrder()->first();
                $apartment->landlord()->associate($landlord);
                $apartment->save();
        });

        factory(Apartment::class, 50)->create()->each(function ($apartment) {

            $services=Service::inRandomOrder()->limit(rand(1,5))->get();
            $apartment->services()->attach($services);

            $statistics=Statistic::inRandomOrder()->limit(rand(1,5))->get();
            $apartment->statistics()->attach($statistics);

            $sponsors=Sponsor::inRandomOrder()->limit(rand(1,5))->get();
            $apartment->sponsors()->attach($sponsors);

            $apartment->save();
        });

    }
}
