<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAUCTION extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_D_AUCTION', function (Blueprint $table) {
            $table->increments('AuctionID')->comment('竞拍主键ID');
            $table->integer('DoveID')->comment('鸽子ID');
            $table->integer('StartPrice')->comment('起拍价');
            $table->integer('AddPrice')->comment('增幅价');
            $table->integer('EndPrice')->comment('得标价');
            $table->dateTime('StartTime')->comment('起拍时间');
            $table->dateTime('EndTime')->comment('结束时间');
            $table->integer('Status')->comment('状态（0：拍卖中；1：已出售；2：流拍）');
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
        Schema::drop('T_D_AUCTION');
    }
}
