<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostVersions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_versions', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255);
            $table->string('slug', 255);
            $table->text('body');
            $table->text('summary')->nullable();
            $table->text('tags')->nullable();
            $table->text('imgurl_featured')->nullable();
            $table->integer('set_comment')->default(0);
            $table->integer('set_active')->default(0);
            $table->integer('set_sticky')->default(0);
            $table->integer('set_featured')->default(0);
            $table->integer('set_private')->default(0);
            $table->string('set_private_password', 255)->nullable();
            $table->string('set_redirect', 255)->nullable();
            $table->timestamps();
            $table->dateTime('published_at');
            $table->integer('user_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->index(['slug', 'set_active']);
            $table->index('set_active');
            $table->index('set_sticky');
            $table->index('set_featured');
            $table->index('set_private');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_versions');
    }
}
