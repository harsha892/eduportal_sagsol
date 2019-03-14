<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTopicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->boolean('is_active')->default(true);

            $table->text('short_description')->nullable();
            $table->text('long_description')->nullable();
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('id')->on('group_subjects')->onDelete('cascade');
            $table->integer('semester')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('topic_contents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('topic_id')->unsigned();
            $table->foreign('topic_id')->references('id')->on('topics')->onDelete('cascade');;

            $table->text('notes')->nullable();
            $table->text('ppt')->nullable();
            $table->text('video')->nullable();
            $table->text('audio')->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::create('content_references', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('content_id')->unsigned();
            $table->foreign('content_id')->references('id')->on('topic_contents')->onDelete('cascade');;

            $table->text('url')->nullable();
            $table->enum('type', ['file', 'url'])->nullable();

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
        Schema::dropIfExists('topic_references');
        Schema::dropIfExists('topic_contents');
        Schema::dropIfExists('topics');
    }
}
