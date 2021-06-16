<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();

            $table -> string('title')->required();
            $table -> string('rooms')->required();
            $table -> integer('bed');
            $table -> integer('bathroom');
            $table -> integer('area');
            $table -> string('address');
            $table -> string('url_img');
            $table -> string('features');

            $table -> bigInteger('landlord_id')->index()->unsigned();
            // $table -> bigInteger('sponsor_id')->index()->unsigned();


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
        Schema::dropIfExists('apartments');
    }
}
