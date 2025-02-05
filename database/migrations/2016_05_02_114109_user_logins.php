<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserLogins extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('user_logins', function (Blueprint $table) {
      $table->engine = 'InnoDB';
      $table->increments('id');
      $table->timestamps();
      $table->string('remote_ip', 255)->nullable();
      $table->string('user_agent', 255)->nullable();
      $table->integer('user_id')->unsigned();
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('user_logins');
  }
}
