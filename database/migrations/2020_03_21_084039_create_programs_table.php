<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('title')->unique();
            $table->smallInteger('max_sessions');
            $table->unsignedBigInteger('faculty_id')->index();            
            $table->smallInteger('credit')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('faculty_id')
            ->references('id')
            ->on('faculties')
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
        Schema::dropIfExists('programs');
    }
}
