<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompanyLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_locations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id')->unsigned()->unique();
            $table->integer('district_id')->unsigned();
            $table->timestamps();
            $table->foreign('company_id')
                  ->references('id')->on('companies');
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
        Schema::drop('company_locations');
    }
}
