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
        Schema::create('tbl_videos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('video_title', 255);
            $table->string('videos_slug', 255);
            $table->string('meta_desc', 255);
            $table->string('meta_key', 255);
            $table->integer('youtube_id');
            $table->integer('course_id');
            $table->text('embed');
            $table->string('thumbnail', 255);
            $table->integer('video_likes');
            $table->integer('video_views');
            $table->integer('video_shares');
            $table->string('thumbnail_width', 100);
            $table->string('thumbnail_height', 100);
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
        Schema::drop('tbl_videos');
    }
}
