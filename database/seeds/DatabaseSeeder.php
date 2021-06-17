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
                MessageSeeder::class,
                LandlordSeeder::class,
                SponsorSeeder::class,
                ServiceSeeder::class,
                StatisticSeeder::class,
                ApartmentSeeder::class,
            ]
        );
    }
}
