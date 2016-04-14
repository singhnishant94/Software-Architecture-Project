<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class JobDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

         Schema::create('password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');

        });

        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('description');
            $table->longText('problem');

            $table->integer('owner')->unsigned();
            $table->foreign('owner')->references('id')->on('users');

            $table->integer('job_holder')->unsigned()->nullable();
            $table->foreign('job_holder')->references('id')->on('users');

            $table->string('position');
            $table->string('location');
            $table->string('salary');
            $table->string('skills');
            $table->timestamps();

        });

        Schema::create('skill', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();

        });

        Schema::create('job_skill', function (Blueprint $table) {
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('job');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skill');
            $table->timestamps();

        });

        Schema::create('user_skill', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('id')->on('skill');
            $table->timestamps();

        });

        Schema::create('applications', function (Blueprint $table) {
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('job');
            $table->integer('applicant')->unsigned();
            $table->foreign('applicant')->references('id')->on('users');
            $table->longText('answer');
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

        Schema::dropIfExists('job_skill');
        Schema::dropIfExists('user_skill');
        Schema::dropIfExists('applications');
        Schema::dropIfExists('job');
        Schema::dropIfExists('skill');
        Schema::dropIfExists('password_resets');
        Schema::dropIfExists('users');


    }
}
