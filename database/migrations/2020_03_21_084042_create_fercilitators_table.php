<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFercilitatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fercilitators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('gender');
            $table->string('dob');
            $table->string('address');
            $table->unsignedBigInteger('role_id')->index();
            $table->unsignedBigInteger('faculty_id')->index();
            $table->unsignedBigInteger('institution_id')->index();
            $table->unsignedBigInteger('course_id')->index();
            $table->foreign('faculty_id')
            ->references('id')
            ->on('faculties')
            ->onDelete('cascade');
            $table->foreign('institution_id')
            ->references('id')
            ->on('institutions')
            ->onDelete('cascade');
            $table->foreign('course_id')
            ->references('id')
            ->on('courses')
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
        Schema::dropIfExists('fercilitators');
    }
}
