<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsAddressesXTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_contact', function (Blueprint $table) {
            $table->integer('contacts_id')->unsigned();
            $table->integer('addresses_id')->unsigned();

            $table->primary(['contacts_id', 'addresses_id']);

            $table->foreign('addresses_id')->references('id')->on('contact_addresses');
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
        Schema::dropIfExists('address_contact');
    }
}
