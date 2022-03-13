<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //function creates a posts table with a unique id auto incremented
        //time stamps for created at or updated at
        //since we are dealing with post, we need more two attributes title and body. let's create them
        // by modifying this function to as below 
        Schema::create('posts', function (Blueprint $table) {
            $table->id();//auto created
            $table->string('title');//manually added
            $table->mediumText('body');//manually added
            $table->timestamps();//auto created
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
