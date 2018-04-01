<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsSellerRequestsXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_seller_request', function (Blueprint $table) {
            $table->integer('contacts_id')->unsigned();
            $table->integer('seller_request_id')->unsigned();

            $table->primary(['contacts_id', 'seller_request_id']);

            $table->foreign('seller_request_id')->references('id')->on('seller_requests');
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
        Schema::dropIfExists('contact_seller_request');
    }
}
