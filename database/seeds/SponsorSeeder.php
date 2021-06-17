<?php

use Illuminate\Database\Seeder;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Sponsor::class,3)->create();
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
