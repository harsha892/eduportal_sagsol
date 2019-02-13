<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

class CreateTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('test_models', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->boolean('is_active');
        //     $table->unsignedInteger('group_id');
        //     $table->unsignedInteger('subject_id');
        //     $table->timestamp('valid_from');
        //     $table->timestamp('valid_to');
        //     $table->float('total_marks');
        //     $table->float('total_time');
        //     $table->string('section_type');
        //     $table->string('question_name_type');
        //     $table->timestamps();
        // });

        // Schema::create('test_model_sections', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('test_model_id');
        //     $table->string('section_name_type');
        //     $table->string('question_type');
        //     $table->unsignedInteger('no_of_questions');
        //     $table->unsignedInteger('no_of_optional_questions');
        //     $table->float('total_marks');
        //     $table->timestamps();
        // });

        // Schema::create('tests', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->boolean('is_active');
        //     $table->unsignedInteger('test_model_id');
        //     $table->unsignedInteger('group_id');
        //     $table->unsignedInteger('subject_id');
        //     $table->timestamp('valid_from');
        //     $table->timestamp('valid_to');
        //     $table->string('created_by');
        //     $table->string('updated_by');

        //     $table->timestamps();
        // });
        // Schema::create('test_questions', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('test_model_section_id');
        //     $table->unsignedInteger('test_id');
        //     $table->unsignedInteger('question_id');
        //     $table->float('marks');
        //     $table->timestamps();
        // });
        // Schema::create('questions', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('type_of_question');
        //     $table->text('title');
        //     $table->string('level_of_difficulty');
        //     $table->text('answer');
        //     $table->string('audio');
        //     $table->string('video');
        //     $table->timestamps();
        // });
        // Schema::create('question_options', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->unsignedInteger('question_id');
        //     $table->text('option_A');
        //     $table->text('option_b');
        //     $table->text('option_c');
        //     $table->text('answer');
        //     $table->timestamps();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('question_options');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('test_questions');
        Schema::dropIfExists('tests');
        Schema::dropIfExists('test_model_sections');
        Schema::dropIfExists('test_models');
    }
}
