<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsors', function (Blueprint $table) {
            $table->id();

<<<<<<< HEAD:database/migrations/2021_06_15_093507_create_sponsors_table.php
            $table -> string('duration');
            $table -> string('price');
=======
            $table->integer('sponsor_duration');
            $table->integer('price');
>>>>>>> Fazio:database/migrations/2021_06_16_163458_create_sponsors_table.php

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsors');
    }
}
