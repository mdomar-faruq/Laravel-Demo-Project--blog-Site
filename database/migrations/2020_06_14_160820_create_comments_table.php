<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('comments')){
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('User_id')->unsigned();
            $table->unsignedBigInteger('Post_id')->nullable();
            $table->string('Content');
            $table->timestamps();
            $table->foreign('User_id')->references('id')->on('users');
            $table->foreign('Post_id')->references('id')->on('posts')->onUpdate('cascade')->onDelete('cascade');


        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
