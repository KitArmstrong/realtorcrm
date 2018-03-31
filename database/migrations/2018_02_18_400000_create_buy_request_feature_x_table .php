<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuyRequestFeatureXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buy_request_feature', function (Blueprint $table) {
            $table->integer('request_id')->unsigned();
            $table->string('feature', 2);

            $table->primary(['request_id', 'feature']);

            $table->foreign('request_id')->references('id')->on('buy_requests');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buy_request_feature');
    }
}
