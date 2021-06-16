<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sponsors')->insert([
            'duration'=>24,
            'price'=>299,
        ]);
        DB::table('sponsors')->insert([
            'duration'=>72,
            'price'=>599,
        ]);
        DB::table('sponsors')->insert([
            'duration'=>144,
            'price'=>999,
        ]);
    }
}
