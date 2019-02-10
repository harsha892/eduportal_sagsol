<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->boolean('is_active');

            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');

            $table->text('short_description');
            $table->text('long_description');
            
            $table->string('type_of_content');
            $table->json('semister_ids');


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
        Schema::dropIfExists('topics');
    }
}
