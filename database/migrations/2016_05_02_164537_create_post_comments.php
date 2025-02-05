<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostComments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_comments', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->text('body');
            $table->string('author_email');
            $table->string('author_name');
            $table->string('author_url');
            $table->integer('set_active')->default(0);
            $table->timestamps();
            $table->integer('visitor_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->index('set_active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_comments');
    }
}
