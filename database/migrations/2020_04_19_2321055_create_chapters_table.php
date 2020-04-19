<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('lecture_id')->index();
            $table->unsignedBigInteger('fercilitator_id')->index();
            $table->string('title');
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->foreign('lecture_id')
            ->references('id')
            ->on('chapters')            
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
        Schema::drop('chapters');
    }
}
