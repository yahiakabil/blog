<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors', function (Blueprint $table) {

            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->timestamps();
            $table->string('remote_ip', 255)->nullable();
            $table->integer('block_ip')->default(0);
            $table->string('country', 255)->nullable();
            $table->string('city', 255)->nullable();
            $table->string('state', 255)->nullable();
            $table->string('referrer', 255)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->string('os_brand', 255)->nullable();
            $table->string('os_version', 255)->nullable();
            $table->string('browser_brand', 255)->nullable();
            $table->string('browser_verion', 255)->nullable();

            $table->index('remote_ip');
            $table->index('block_ip');
            $table->index('country');
            $table->index('city');
            $table->index('state');
            $table->index('referrer');
            $table->index('user_agent');
            $table->index('os_brand');
            $table->index('os_version');
            $table->index('browser_brand');
            $table->index('browser_verion');
            $table->double('latitude', 11, 8)->nullable();
            $table->double('longitude', 11, 8)->nullable();
            $table->string('zipcode', 20)->nullable();
            $table->string('platform', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
