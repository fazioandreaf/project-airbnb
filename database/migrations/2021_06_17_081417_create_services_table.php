<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
<<<<<<< HEAD:database/migrations/2021_06_15_140620_create_sponsored_apartments_table.php
        Schema::create('sponsored_apartments', function (Blueprint $table) {

            $table -> id();

            $table -> date('expired_date');
            $table -> bigInteger('apartment_id') -> unsigned() -> index();

            $table -> bigInteger('sponsor_id') -> unsigned() -> index();

            $table -> timestamps();
=======
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
>>>>>>> Fazio:database/migrations/2021_06_17_081417_create_services_table.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
