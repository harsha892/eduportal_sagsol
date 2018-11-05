<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruiterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruiter', function (Blueprint $table) {
            $table->increments('recruiter_company_id');  
            $table->integer('recruiter_company_id')->unsigned();
            $table->foreign('recruiter_company_id')->references('id')->on('users');
            $table->string('full_name');
            $table->string('email');
            $table->string('password');
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
        Schema::dropIfExists('recruiter');
    }
}
