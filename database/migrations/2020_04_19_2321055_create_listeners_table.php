<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatelistenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('listeners', function (Blueprint $table) {
            $table->id();            
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('item_id')->index();
            $table->string('item_type',20);
            $table->string('duration',250)->nullable();
            $table->boolean('status')->default(1);
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
        Schema::drop('listeners');
    }
}
