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
        $sponsors = [
            [
                'sponsor_duration'=>24,
                'price'=>299,
            ],
            [
                'sponsor_duration'=>72,
                'price'=>599,
            ],
            [
                'sponsor_duration'=>144,
                'price'=>999,
            ]
        ];

        foreach($sponsors as $sponsor) {
            factory(Sponsor::class) -> create($sponsor)->each(function ($sponsor) {
                $apartments = Apartment::inRandomOrder()->limit(rand(1,10))->get();
                $sponsor->apartments()->attach($apartments);
                $sponsor->save();
            });
        };
    }
}
