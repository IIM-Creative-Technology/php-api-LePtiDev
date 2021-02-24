<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('start');
            $table->integer('end');

            $table->unsignedBigInteger('classroom_id');
            $table->unsignedBigInteger('speaker_id');

            $table->foreign('classroom_id')
                ->references('id')
                ->on('classrooms');

            $table->foreign('speaker_id')
                ->references('id')
                ->on('speakers');

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
        Schema::dropIfExists('courses');
    }
}
