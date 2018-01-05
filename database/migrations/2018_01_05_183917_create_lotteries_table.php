<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_lottery_id')->unsigned();
            $table->integer('county_id')->unsigned();
            $table->string('name');
            $table->integer('entry_fee');
            $table->integer('prize');
            $table->date('expire_at');
            $table->integer('winner_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('parent_lottery_id')
                ->references('id')->on('parent_lotteries');
            $table->foreign('county_id')
                ->references('id')->on('counties');
            $table->foreign('winner_id')
                ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lotteries');
    }
}
