<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssigmentRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigment_ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assigment_id');
            $table->unsignedBigInteger('rating_id');
            $table->timestamps();

            $table->foreign('assigment_id')->references('id')->on('assigments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigment_ratings');
    }
}
