<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecurityUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('profile_status')->nullable()->after('email')->comment('0=UnPublic, 1=Public')->default('0');
            $table->integer('show_email')->nullable()->after('profile_status')->comment('0=Not show, 1=Show')->default('1');
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
            $table->dropColumn('profile_status');
            $table->dropColumn('show_email');
        });
    }
}
