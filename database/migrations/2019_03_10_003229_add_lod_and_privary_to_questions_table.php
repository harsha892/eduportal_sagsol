<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLodAndPrivaryToQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->integer('difficulty_id')->unsigned()->after('subject_id');
            //$table->foreign('difficulty_id')->references('id')->on('difficulty')->onDelete('cascade');

            $table->integer('privacy_id')->unsigned()->after('difficulty_id');
            //$table->foreign('privacy_id')->references('id')->on('privacy')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->dropColumn(['privacy_id' , 'difficulty_id']);
        });
    }
}
