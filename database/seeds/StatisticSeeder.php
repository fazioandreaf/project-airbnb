<?php

use Illuminate\Database\Seeder;
use App\Statistic;
use App\Apartment;

class StatisticSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Statistic::class, 50)->create()->each(function ($statistic) {

            $apartments=Apartment::inRandomOrder()->limit(rand(1,5))->get();
            $statistic->apartments()->attach($apartments);
            $statistic->save();
        });
    }
}
