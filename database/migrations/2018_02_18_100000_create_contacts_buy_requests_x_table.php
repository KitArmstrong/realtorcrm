<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsBuyRequestsXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_buy_request', function (Blueprint $table) {
            $table->integer('contacts_id')->unsigned();
            $table->integer('buy_request_id')->unsigned();

            $table->primary(['contacts_id', 'buy_request_id']);

            $table->foreign('buy_request_id')->references('id')->on('buy_requests');
            $table->foreign('contacts_id')->references('id')->on('contacts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contact_buy_request');
    }
}
