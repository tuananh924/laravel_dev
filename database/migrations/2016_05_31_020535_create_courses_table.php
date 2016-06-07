<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('tbl_courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('course_title', 150);
            $table->string('course_slug', 200);
            $table->string('meta_desc', 255);
            $table->string('meta_key', 255);
            $table->integer('parent_id');
            $table->tinyInteger('sort_order');
            $table->string('course_image', 200);
            $table->integer('course_video_qty');
            $table->integer('course_user_qty');
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
        Schema::drop('tbl_courses');
    }
}
