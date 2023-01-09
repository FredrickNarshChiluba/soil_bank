<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('nutrients', function (Blueprint $table) {
            $table->integer('sand_percentage')->nullable();
            $table->integer('soil_percentage')->nullable();
            $table->integer('silt_percentage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('nutrients', function (Blueprint $table) {
            $table->dropColumn('sand_percentage')->nullable();
            $table->dropColumn('soil_percentage')->nullable();
            $table->dropColumn('silt_percentage')->nullable();
            
        });
    }
};
