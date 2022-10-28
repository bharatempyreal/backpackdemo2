<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('business_name')->nullable()->after('email');
            $table->string('phone')->nullable()->after('business_name');
            $table->string('landmark')->nullable()->after('phone');
            $table->string('city')->nullable()->after('landmark');
            $table->string('state')->nullable()->after('city');
            $table->string('zipcode')->nullable()->after('state');
            $table->string('bio_information')->nullable()->after('zipcode');
            $table->text('profile_pic')->nullable()->after('bio_information');

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
            if (Schema::hasColumn('users', 'business_name'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('business_name');
                });
            }
            if (Schema::hasColumn('users', 'phone'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('phone');
                });
            }
            if (Schema::hasColumn('users', 'landmark'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('landmark');
                });
            }
            if (Schema::hasColumn('users', 'city'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('city');
                });
            }
            if (Schema::hasColumn('users', 'state'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('state');
                });
            }
            if (Schema::hasColumn('users', 'zipcode'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('zipcode');
                });
            }
            if (Schema::hasColumn('users', 'profile_pic'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('profile_pic');
                });
            }
            if (Schema::hasColumn('users', 'bio_information'))
            {
                Schema::table('users', function (Blueprint $table)
                {
                    $table->dropColumn('bio_information');
                });
            }
        });
    }
}
