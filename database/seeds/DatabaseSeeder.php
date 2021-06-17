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
                LandlordSeeder::class,
                ServicesSeeder::class,
                MessageSeeder::class,
                SponsorSeeder::class,
                StatisticSeeder::class,
                ApartmentSeeder::class,
            ]
        );
    }
}
