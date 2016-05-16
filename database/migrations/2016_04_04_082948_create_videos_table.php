<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->index();
            $table->string('youtube_id')->index();
            $table->string('title');
            $table->string('description');
            $table->string('thumbnail');
            $table->text('embed');
            $table->string('views');
            $table->string('likes');
            $table->string('shares');
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
        Schema::drop('videos');
    }
}
