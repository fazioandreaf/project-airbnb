<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apartment_sponsor', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentSponsor')
                ->references('id')
                ->on('apartments');

            $table->foreign('sponsor_id','sponsorApartment')
                ->references('id')
                ->on('sponsors');

        });

        Schema::table('apartment_statistic', function (Blueprint $table) {
            $table->foreign('apartment_id','apartmentStatistic')
                ->references('id')
                ->on('apartments');

            $table->foreign('statistic_id','statisticApartment')
                ->references('id')
                ->on('statistics');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apartment_sponsor', function (Blueprint $table) {
            $table->dropForeign('apartmentSponsor');
            $table->dropForeign('sponsorApartment');
        });

        Schema::table('apartment_statistic', function (Blueprint $table) {
            $table->dropForeign('apartmentStatistic');
            $table->dropForeign('statisticApartment');
        });
    }
}
