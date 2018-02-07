<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('mobile_phone', 15);
            $table->string('home_phone', 15);
            $table->string('alt_phone', 15);
            $table->string('email');
            $table->string('company');
            $table->string('title');
            $table->string('status', 1);
            $table->date('startdate');
            $table->date('enddate');
            $table->string('motive', 2);
            $table->string('referred_by');
            $table->string('contact_method', 2);
            $table->string('contact_time', 2);
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
        Schema::dropIfExists('contacts');
    }
}
