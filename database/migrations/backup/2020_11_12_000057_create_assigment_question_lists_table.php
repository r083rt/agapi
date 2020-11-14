<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAssigmentQuestionListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('assigment_question_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('assigment_id');
            $table->unsignedBigInteger('creator_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('question_list_id');
            $table->unsignedBigInteger('assigment_type_id')->nullable();
            $table->timestamps();

            $table->foreign('assigment_id')->references('id')->on('assigments')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('creator_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');
            $table->foreign('question_list_id')->references('id')->on('question_lists')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('assigment_type_id')->references('id')->on('assigment_types')->onDelete('cascade')->onUpdate('cascade');        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assigment_question_lists');
    }
}
