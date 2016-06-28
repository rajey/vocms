<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckMeasuredDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('truck_measured_data', function (Blueprint $table) {
            $table->increments('id');
            $table->decimal('gross_mass', 3, 2);
            $table->string('remarks', 20);
            $table->integer('truck_id')->unsigned();
            $table->integer('station_id')->unsigned();
            $table->timestamp('measured_at');
            $table->timestamps();

            $table->foreign('truck_id')
                  ->references('id')->on('trucks');
            $table->foreign('station_id')
                  ->references('id')->on('weighbridge_stations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('truck_measured_data');
    }
}
