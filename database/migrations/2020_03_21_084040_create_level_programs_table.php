<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevelProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('level_programs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g: CHM leve 100
            $table->string('courses',500)->nullable();
            $table->boolean('level')->nullable();
            $table->smallInteger('max_credit')->default(26);
            $table->unsignedBigInteger('program_id')->index();
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
        Schema::dropIfExists('level_programs');
    }
}
