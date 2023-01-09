<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('farmer_id');
            $table->string('address');
            $table->string('Land_size');
            $table->string('land_location_cordinates'); 
            // $table->foreign('farmer_id')->references('id')->on('farmers');           
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
        Schema::dropIfExists('land');
    }
}
