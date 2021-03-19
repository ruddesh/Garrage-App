<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatogoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catogories', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_catogory');
            $table->string('vehicle_brand');
            $table->string('vehicle_name');
            $table->integer('manufacturing_year');
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
        Schema::dropIfExists('catogories');
    }
}
