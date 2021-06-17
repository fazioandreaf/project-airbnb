<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(
            [
                ServiceSeeder::class,
                MessageSeeder::class,
                LandlordSeeder::class,
                SponsorSeeder::class,
                StatisticSeeder::class,
                ApartmentSeeder::class,
            ]
        );
    }
}
