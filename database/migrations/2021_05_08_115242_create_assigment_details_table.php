<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAssigmentDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('assigment_id')->constrained();
            $table->unsignedBigInteger('ref_id');
            $table->foreign('ref_id')->references('id')->on('assigments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigment_details');
    }
}
