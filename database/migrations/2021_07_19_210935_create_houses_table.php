<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('description')->nullable();
            $table->tinyInteger('beds');
            $table->tinyInteger('bathrooms');
            $table->integer('square_metre')->nullable();
            $table->string('country', 120);
            $table->string('city', 120);
            $table->string('address', 255);
            $table->float('long', 11, 8);
            $table->float('lat', 11, 8);
            $table->string('image', 255);
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
        Schema::dropIfExists('houses');
    }
}
