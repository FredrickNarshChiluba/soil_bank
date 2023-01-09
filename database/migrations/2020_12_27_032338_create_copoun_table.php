<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCopounTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('copoun', function (Blueprint $table) {
            $table->bigIncrements('id');    
            $table->unsignedBigInteger('user_id');        
            $table->string('code');
            $table->string('total_days');
            $table->string('expiry_date');
            $table->string('usage_start_date');
            $table->string('period');
            // $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('copoun');
    }
}
