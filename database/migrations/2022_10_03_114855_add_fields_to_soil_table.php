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
        Schema::table('soil', function (Blueprint $table) {
            $table->string('field_name')->nullable();
            $table->string('land_size')->nullable();
            $table->string('field_unit')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soil', function (Blueprint $table) {
            $table->dropColumn('field_name');
            $table->dropColumn('land_size');
            $table->dropColumn('field_unit');
        });
    }
};
