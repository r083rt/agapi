<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentSharingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_sharings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('payment_from');
            $table->unsignedBigInteger('payment_to');
            $table->foreign('payment_from')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('payment_to')->references('id')->on('payments')->onUpdate('cascade')->onDelete('cascade');
            
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
        Schema::dropIfExists('payment_sharings');
    }
}
