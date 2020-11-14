<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionnarySessionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnary_session_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            // $table->unsignedBigInteger('questionnary_session_id');
            // $table->unsignedBigInteger('question_list_id');
            // // $table->string('quest');
            // // $table->string('value')->nullable();
            // $table->timestamps();

            // $table->foreign('questionnary_session_id')->references('id')->on('questionnary_sessions')->onDelete('cascade')->onUpdate('cascade');
            // $table->foreign('question_list_id')->references('id')->on('question_lists')->onDelete('cascade')->onUpdate('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnary_session_details');
    }
}
