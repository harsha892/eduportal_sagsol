<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableQuestionPaperModels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_paper_models', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('marks');
            $table->double('time', 8, 2);
            $table->integer('no_of_sections');
            $table->unsignedInteger('group_id')->nullable();
            $table->unsignedInteger('subject_id')->nullable();
            $table->string('section_type')->nullable();
            $table->string('name_type')->nullable();
            $table->timestamps();
        });

        Schema::create('question_paper_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('questions');
            $table->integer('options');
            $table->integer('marks');
            $table->string('question_type')->nullable();
            $table->unsignedInteger('model_id')->nullable();
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
        Schema::dropIfExists('question_paper_sections');
        Schema::dropIfExists('question_paper_models');
    }
}
