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
            $table->tinyInteger('rooms_number');
            $table->integer('square_metre')->nullable();
            $table->string('country', 120);
            $table->string('region', 120)->nullable();
            $table->string('city', 120);
            $table->string('address', 255);
            $table->integer('postal_code')->nullable();
            $table->tinyInteger('house_number')->nullable();
            $table->boolean('visibility')->nullable();
            $table->float('long', 11, 8)->nullable();
            $table->float('lat', 11, 8)->nullable();
            $table->string('image', 255)->nullable();
            $table->string('image_original_name')->nullable();
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
