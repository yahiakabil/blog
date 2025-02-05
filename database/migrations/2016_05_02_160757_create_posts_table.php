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
        Schema::create('posts', function (Blueprint $table) {
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
        Schema::dropIfExists('posts');
    }
}


// title	varchar(255)
// slug	varchar(255)
// summary	varchar(512) NULL
// body	text NULL
// tags	text NULL
// imgurl_featured	text NULL
// imgurl_thumb	text NULL
// created_at	timestamp [CURRENT_TIMESTAMP]
// updated_at	datetime
// published_at	datetime
// set_comment	int(1) [0]
// set_active	int(1) [0]
// set_sticky	int(1) [0]
// set_featured	int(1) [0]
// set_private	int(1) [0]
// set_private_password	varchar(128) NULL
// set_redirect	varchar(512) NULL
