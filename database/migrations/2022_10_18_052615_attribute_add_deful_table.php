<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AttributeAddDefulTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attributes', function (Blueprint $table) {
            $table->integer('is_default')->nullable()->after('attributegroup_id')->default('0');
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
            $table->dropColumn('is_default');
        });
    }
}
