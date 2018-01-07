<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('lottery_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('lottery_transaction_id')->unsigned();
            $table->varchar('draw_number', 20);
            $table->timestamps();

            $table->foreign('lottery_id')
                ->references('id')->on('lotteries');
            $table->foreign('user_id')
                ->references('id')->on('users');
            $table->foreign('lottery_transaction_id')
                ->references('id')->on('lottery_transactions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_lotteries');
    }
}
