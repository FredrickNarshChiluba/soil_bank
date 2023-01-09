<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSoilTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soil', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('land_id');
            $table->string('soil_type');
            $table->string('soil_color');
            $table->string('soil_texture');
            // $table->foreign('land_id')->references('id')->on('land');
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
        Schema::dropIfExists('soil');
    }
}
