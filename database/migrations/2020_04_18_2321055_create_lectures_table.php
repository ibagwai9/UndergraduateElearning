<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('course_id')->index();
            $table->unsignedBigInteger('session_id')->index();
            $table->unsignedBigInteger('fercilitator_id')->index();
            $table->string('title');
            $table->text('content');
            $table->integer('semester');
            $table->boolean('status')->default(1);
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')            
            ->onDelete('cascade');
            $table->foreign('session_id')
            ->references('id')
            ->on('sessions')            
            ->onDelete('cascade');
            $table->foreign('fercilitator_id')
            ->references('id')
            ->on('fercilitators')            
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
        Schema::drop('lectures');
    }
}
