<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job', function (Blueprint $table) {
            $table->increments('id');
            $table->increments('user_id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('recruiter');
            $table->increments('vendor_id');
            $table->integer('vendor_id')->unsigned();
            $table->foreign('vendor_id')->references('vendor_id')->on('vendors');
            $table->string('job_title');
            $table->string('location');
            $table->string('job_desc');
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
        Schema::dropIfExists('job');
    }
}
