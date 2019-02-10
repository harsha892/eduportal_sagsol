<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemistesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semisters', function (Blueprint $table) {
            $table->increments('id');

            $table->string('name');
            $table->boolean('is_active');
            
            $table->unsignedInteger('created_by');
            $table->unsignedInteger('updated_by');

            $table->text('start_date');
            $table->text('end_date');

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
        Schema::dropIfExists('semisters');
    }
}