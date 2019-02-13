<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description');

            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('group_subjects', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('group_id')->unsigned();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');

            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->integer('year')->nullable();
            $table->integer('semester')->nullable();
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('group_subjects');
        Schema::dropIfExists('subjects');
    }
}
