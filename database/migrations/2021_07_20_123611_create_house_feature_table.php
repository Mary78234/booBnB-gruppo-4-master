<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_feature', function (Blueprint $table) {
            

            $table->unsignedBigInteger('house_id');
            $table->foreign('house_id')
                  ->references('id')
                  ->on('houses')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('feature_id');
            $table->foreign('feature_id')
                  ->references('id')
                  ->on('features')
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
        Schema::dropIfExists('house_feature');
    }
}
