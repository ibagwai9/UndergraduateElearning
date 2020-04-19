<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentAssessmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_assessments', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('student_id')->index();
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('session_id')->index();
            $table->string('score')->nullable();
            $table->integer('level');
            $table->integer('semester');
            $table->boolean('status');
            $table->foreign('student_id')
            ->references('id')
            ->on('students')            
            ->onDelete('cascade');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')            
            ->onDelete('cascade');
            $table->foreign('session_id')
            ->references('id')
            ->on('sessions')            
            ->onDelete('cascade');
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
        Schema::drop('student_assessments');
    }
}
