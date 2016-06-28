<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStationLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('station_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('station_id')->unsigned()->unique();
            $table->integer('district_id')->unsigned();
            $table->timestamps();

            $table->foreign('station_id')
                  ->references('id')->on('weighbridge_stations');
            $table->foreign('district_id')
                  ->references('id')->on('districts');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('station_locations');
    }
}
