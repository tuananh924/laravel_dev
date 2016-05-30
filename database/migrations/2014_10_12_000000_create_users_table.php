<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username',50);
            $table->string('password',100);
            $table->string('email',150)->unique();
            $table->string('address',255);
            $table->string('phone',15);
            $table->tinyInteger('active');
            $table->integer('school_id');
            $table->integer('skill_id');
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
