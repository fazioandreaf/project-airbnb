<?php

use Illuminate\Database\Seeder;
Use App\Message;
use App\Apartment;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Message::class,50) -> make() ->each(function($messages){
            $apartment=Apartment::inRandomOrder()->first();
            $messages->apartment()->associate($apartment);
            $messages->save();
        });
    }
}
