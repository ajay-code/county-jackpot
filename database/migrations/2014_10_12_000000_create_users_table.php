<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('gender')->nullable();
            $table->string('phone',11)->nullable();
            $table->integer('county_id')->unsigned()->nullable();
            $table->text('street_address')->nullable();
            $table->enum('status',['active', 'deactive'])->default('active');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('county_id')
                ->references('id')->on('counties');
        });

        Schema::table('users', function ($table) {
            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
