<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentLotteriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_lotteries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('county_id')->unsigned()->nullable();
            $table->enum('always_active', ['yes', 'no'])->default('yes');
            $table->string('name');
            $table->integer('entry_fee');
            $table->integer('prize');
            $table->boolean('featured')->default(false);
            $table->date('expire_at');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('county_id')
                ->references('id')->on('counties');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_lotteries');
    }
}
