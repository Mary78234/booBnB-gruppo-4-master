<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_service', function (Blueprint $table) {
            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')
                  ->references('id')
                  ->on('houses')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')
                  ->references('id')
                  ->on('services')
                  ->onDelete('cascade');      
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('house_service');
    }
}
