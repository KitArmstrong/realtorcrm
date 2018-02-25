<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_requests', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('home_type', 2);
            $table->string('home_age', 2);
            $table->integer('sq_feet');
            $table->tinyInteger('bedrooms');
            $table->tinyInteger('bathrooms');
            $table->string('location');
            $table->string('features', 2);
            $table->integer('max_price');
            $table->string('pre_approved', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_requests');
    }
}