<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepartmentDivisionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department_divisions', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->date('start_date');
            $table->date('end_date');
            $table->nullableMorphs('divisionable');
            $table->timestamps();
        });

        Schema::table('departments', function (Blueprint $table) {
            $table->foreignId('division_id')->nullable()->constrained('department_divisions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('department_divisions');
        Schema::table('departments', function (Blueprint $table) {
            $table->dropForeign(['department_division_id']);
            $table->dropColumn('department_division_id');
        });
    }
}
