<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('groups', function (Blueprint $table) {
            $table->increments('id');

            $table->string('slug')->unique();
            $table->string('name');
            $table->text('description')->nullable();
            $table->integer('duration')->default(1)->nullable();
            $table->integer('semesters')->default(1)->nullable();

            $table->boolean('is_active')->default(true);

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
        Schema::dropIfExists('groups');
    }
}
