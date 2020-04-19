<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('gender')->nullable();
            $table->string('dob')->nullable();            
            $table->string('address')->nullable();
            $table->string('phone')->nullable()->unique();
            $table->string('reg_no')->nullable()->unique();
            $table->unsignedBigInteger('level')->nullable()->index();
            $table->unsignedBigInteger('faculty_id')->nullable()->index();
            $table->unsignedBigInteger('institution_id')->nullable()->index();
            $table->unsignedBigInteger('program_id')->nullable()->index();
            $table->boolean('status')->default(false);
            $table->foreign('faculty_id')
            ->references('id')
            ->on('faculties')
            ->onDelete('cascade');
            $table->foreign('institution_id')
            ->references('id')
            ->on('institutions')
            ->onDelete('cascade');
            $table->foreign('program_id')
            ->references('id')
            ->on('programs')
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
        Schema::dropIfExists('students');
    }
}
