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
            $table->renameColumn('land_location_cordinates', 'land_location_district');
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
            $table->dropColumn('land_location_district');
        });
    }
};
