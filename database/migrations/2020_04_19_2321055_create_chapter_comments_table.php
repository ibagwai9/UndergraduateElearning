<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_comments', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('chapter_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->text('content');
            $table->boolean('status')->default(1);
            $table->foreign('chapter_id')
            ->references('id')
            ->on('chapters')            
            ->onDelete('cascade');
            $table->foreign('user_id')
            ->references('id')
            ->on('users')            
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
        Schema::drop('chapter_comments');
    }
}
