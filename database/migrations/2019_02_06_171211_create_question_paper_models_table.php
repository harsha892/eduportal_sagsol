<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionPaperModelsTable extends Migration
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
            $table->boolean('is_active');

            $table->string('groupId');
            $table->string('subjectId');
            
            $table->float('total_marks');
            $table->float('total_time');
            
            $table->date('valid_from');
            $table->date('valid_to');
            
            $table->json('no_of_sections');
            $table->json('section_type');
            $table->json('questions_name_type');
            
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
        Schema::dropIfExists('question_paper_models');
    }
}
