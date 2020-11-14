<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonPlanFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_plan_formats', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('educational_level_id');
            $table->string('name');
            $table->timestamps();

            $table->foreign('educational_level_id')->references('id')->on('educational_levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lesson_plan_formats');
    }
}
