<?php

use Illuminate\Database\Seeder;
use App\Sponsor;
use App\Apartment;

class SponsorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(Sponsor::class,3)->create();
        
        DB::table('sponsors')->insert([
            'sponsor_duration'=>24,
            'price'=>299,
        ]);
        DB::table('sponsors')->insert([
            'sponsor_duration'=>72,
            'price'=>599,
        ]);
        DB::table('sponsors')->insert([
            'sponsor_duration'=>144,
            'price'=>999,
        ]);
        factory(Sponsor::class)->create()->each(function ($sponsor) {

            $apartments=Apartment::inRandomOrder()->limit(1)->get();
            $sponsor->apartments()->attach($apartments);
            $sponsor->save();
        });

    }
}
