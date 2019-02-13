<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');

            $table->string('title');

            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');;

            $table->text('detail')->nullable();
            $table->text('audio')->nullable();
            $table->text('video')->nullable();

            $table->enum('type', ['objective', 'descriptive', 'orative', 'mcq']);

            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('group_subjects')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('question_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->text('audio')->nullable();
            $table->text('video')->nullable();
            $table->text('attachment')->nullable();

            $table->boolean('correct')->default(false);
            $table->integer('question_id')->unsigned();
            $table->foreign('question_id')->references('id')->on('questions')->onDelete('cascade');
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
        Schema::dropIfExists('question_answers');
        Schema::dropIfExists('questions');
    }
}
