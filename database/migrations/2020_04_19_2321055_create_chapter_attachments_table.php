<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_attachments', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('chapter_id')->index();
            $table->unsignedBigInteger('fercilitator_id')->index();
            $table->string('name');
            $table->string('url');
            $table->string('mime_type')->nullable();
            $table->string('ext')->nullable();
            $table->boolean('status')->default(1);
            $table->foreign('chapter_id')
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
        Schema::drop('chapter_attachments');
    }
}
