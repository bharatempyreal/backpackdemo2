<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSecurityUserAuthenticatorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('authenticator')->nullable()->after('show_email')->comment('0=No, 1=Yes')->default('0');
            $table->integer('smsrecovery')->nullable()->after('authenticator')->comment('0=No, 1=Yes')->default('0');
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
            $table->dropColumn('authenticator');
            $table->dropColumn('smsrecovery');
        });
    }
}
