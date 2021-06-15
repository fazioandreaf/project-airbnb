<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSponsoredApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sponsored_apartments', function (Blueprint $table) {

            $table -> id();

            $table -> date('expired_date');
            $table -> bigInteger('apartment_id') -> unsigned() -> index();
            $table -> bigInteger('sponsor_id') -> unsigned() -> index();

            $table -> timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sponsored_apartments');
    }
}
