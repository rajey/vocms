<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTruckTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trucks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plate_number', 7)->unique();
            $table->string('tag_id', 20)->unique();
            $table->integer('company_id')->unsigned();
            $table->integer('configuration_id')->unsigned();
            $table->timestamps();

            $table->foreign('company_id')
                  ->references('id')->on('companies');

            $table->foreign('configuration_id')
                  ->references('id')->on('truck_configurations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('trucks');
    }
}
