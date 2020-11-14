<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id');
            $table->string('school_place')->nullable();
            $table->string('home_address')->nullable();
            $table->string('nip')->nullable();
            $table->string('nik')->nullable();
            $table->string('contact')->nullable();
            $table->unsignedBigInteger('educational_level_id')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->string('nama_kepala_satuan_pendidikan')->nullable();
            $table->string('nip_kepala_satuan_pendidikan')->nullable();
            $table->string('gender')->nullable();
            $table->dateTime('birthdate')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
