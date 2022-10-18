<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeAddIscompulsoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->integer('compulsory')->nullable()->after('is_default')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->dropColumn('compulsory');
        });
    }
}
