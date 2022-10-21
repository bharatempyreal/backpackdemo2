<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('reminders_notification')->nullable()->after('smsrecovery')->comment('0=Off, 1=On')->default('0');
            $table->integer('advertisement_updates_notification')->nullable()->after('reminders_notification')->comment('0=Off, 1=On')->default('0');
            $table->integer('repost_notification')->nullable()->after('advertisement_updates_notification')->comment('0=Off, 1=On')->default('0');
            $table->integer('sales_promotions_notification')->nullable()->after('repost_notification')->comment('0=Off, 1=On')->default('0');
            $table->integer('product_updates_notification')->nullable()->after('sales_promotions_notification')->comment('0=Off, 1=On')->default('0');
            $table->integer('newsletter_notification')->nullable()->after('product_updates_notification')->comment('0=Off, 1=On')->default('0');
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
            $table->dropColumn('reminders_notification');
            $table->dropColumn('advertisement_updates_notification');
            $table->dropColumn('repost_notification');
            $table->dropColumn('sales_promotions_notification');
            $table->dropColumn('product_updates_notification');
            $table->dropColumn('newsletter_notification');
        });
    }
}
