<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('firstname')->nullable()->after('name');
            $table->string('lastname')->nullable()->after('firstname');
            $table->string('address')->nullable()->after('lastname');
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
            if (Schema::hasColumn('users', 'firstname'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('firstname');
                });
            }
            if (Schema::hasColumn('users', 'lastname'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('lastname');
                });
            }
            if (Schema::hasColumn('users', 'address'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('address');
                });
            }
        });
    }
}
