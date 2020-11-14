<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('bank_account_from_id');
            $table->unsignedBigInteger('bank_account_to_id');
            $table->text('description')->nullable();
            $table->foreign('bank_account_from_id')->references('id')->on('bank_accounts')->onDelete('cascade')->nullable();
            $table->foreign('bank_account_to_id')->references('id')->on('bank_accounts')->onDelete('cascade')->nullable();

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
        Schema::dropIfExists('transactions');
    }
}
