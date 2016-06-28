<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeighbridgeStationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weighbridge_stations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('status', 10);
            $table->string('station_number', 10);
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
        Schema::drop('weighbridge_stations');
    }
}
