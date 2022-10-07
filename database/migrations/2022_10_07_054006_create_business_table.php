<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->string('businessname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->string('landmark')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('zipcode')->nullable();
            $table->string('bioinformation')->nullable();
            $table->string('asset_name')->nullable();
            $table->string('asset_type')->nullable();
            $table->text('asset_image')->nullable();
            $table->string('asset_address')->nullable();
            $table->string('asset_landmark')->nullable();
            $table->string('asset_city')->nullable();
            $table->string('asset_state')->nullable();
            $table->string('asset_zipcode')->nullable();
            $table->string('asset_advertisement_requirements')->nullable();
            $table->text('asset_property_gallery')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business');
    }
}
