<?php

use Illuminate\Database\Seeder;
use App\Landlord;

class LandlordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Landlord::class, 30) -> create();
    }
}
