<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoTrackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_video_trackings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('video_id');
            $table->integer('user_video_likes');
            $table->integer('user_video_shares');
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
        //
    }
}
