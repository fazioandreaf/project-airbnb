<?php

use Illuminate\Database\Seeder;
use App\Apartment;
use App\LandLord;
use App\Sponsor;

class ApartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Apartment::class) -> make()
            -> each(function ($apartment) {

                $sponsor = Sponsor::inRandomOrder()->first();
                $apartment->sponsor()->associate($sponsor);

                $landlord = LandLord::inRandomOrder()->first();
                $apartment->landlord()->associate($landlord);

                $statistic = Statistic::inRandomOrder()->first();
                $apartment->statistic()->associate($statistic);

            });
    }
}
