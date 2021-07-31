<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHouseSponsorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('house_sponsor', function (Blueprint $table) {
            $table->id();
            $table->date('expire_date');

            $table->unsignedBigInteger('house_id');

            $table->foreign('house_id')
                  ->references('id')
                  ->on('houses')
                  ->onDelete('cascade');

            $table->unsignedBigInteger('sponsor_id');

            $table->foreign('sponsor_id')
                  ->references('id')
                  ->on('sponsors')
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
        Schema::dropIfExists('house_sponsor');
    }
}
