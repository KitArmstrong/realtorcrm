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
            $table->string('mobile_phone', 15)->nullable();
            $table->string('home_phone', 15)->nullable();
            $table->string('alt_phone', 15)->nullable();
            $table->string('email')->nullable();
            $table->string('company')->nullable();
            $table->string('title')->nullable();
            $table->string('status', 1)->nullable();
            $table->date('startdate')->nullable();
            $table->date('enddate')->nullable();
            $table->string('motive', 2)->nullable();
            $table->string('referred_by')->nullable();
            $table->string('contact_method', 2)->nullable();
            $table->string('contact_time', 2)->nullable();
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
