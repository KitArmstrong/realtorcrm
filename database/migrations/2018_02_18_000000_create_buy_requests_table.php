->nullable()<?php

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
            $table->string('motive', 2)->nullable();
            $table->string('home_type', 2)->nullable();
            $table->string('home_age', 2)->nullable();
            $table->integer('sq_feet')->nullable();
            $table->tinyInteger('bedrooms')->nullable();
            $table->tinyInteger('bathrooms')->nullable();
            $table->string('location')->nullable();
            $table->string('features', 2)->nullable();
            $table->integer('max_price')->nullable();
            $table->string('pre_approved', 1)->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
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