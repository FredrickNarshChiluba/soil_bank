<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNutrientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nutrients', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Soil_type');
            $table->string('Soil_texture');
            $table->string('Organic_Carbons');
            $table->string('Organic_Carbon');
            $table->string('Soil_phps');
            $table->string('Soil_php');
            $table->string('Nitrogens');            
            $table->string('Nitrogen');
            $table->string('Phosphoruss');
            $table->string('Phosphorus');
            $table->string('Potassiums');
            $table->string('Potassium');
            $table->string('Cation_Exchange_Capacitys');
            $table->string('Cation_Exchange_Capacity');
            $table->string('field_name');
            $table->string('Land_size');
            $table->string('field_unit');
            $table->string('land_location_cordinates');
            $table->string('farmer_name');
            $table->string('farmer_email');
            $table->string('farmer_address');
            $table->string('farmer_contact');
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
        Schema::dropIfExists('nutrients');
    }
}
