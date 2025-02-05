<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPermissionsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('set_active')->default(0);
            $table->integer('set_category')->default(0);
            $table->integer('set_post')->default(0);
            $table->integer('set_upload')->default(0);
            $table->integer('set_moderate')->default(0);
            $table->integer('set_report')->default(0);
            $table->integer('set_admin')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('set_active');
            $table->dropColumn('set_category');
            $table->dropColumn('set_post');
            $table->dropColumn('set_upload');
            $table->dropColumn('set_moderate');
            $table->dropColumn('set_report');
            $table->dropColumn('set_admin');
        });
    }
}
