<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('body');
            $table->string('key')->nullable();
            $table->foreignId('author_id')->constrained('users');
            // slug
            $table->string('slug')->nullable()->unique();
            // seo title nullable
            $table->string('seo_title')->nullable();
            // meta description nullable
            $table->string('meta_description')->nullable();
            // meta keyword nullable
            $table->string('meta_keyword')->nullable();
            // status nullable
            $table->string('status')->nullable();
            // soft delete
            $table->softDeletes();
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
        Schema::dropIfExists('articles');
    }
}
