<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionPaperModelsSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('question_paper_models_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('question_paper_id');
            $table->string('section_name');
            $table->unsignedInteger('no_of_questions');
            $table->string('questions_type');
            $table->float('total_marks');

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
        Schema::dropIfExists('question_paper_models_sections');
    }
}
