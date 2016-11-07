<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBUY extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_U_BUY', function (Blueprint $table) {
            $table->increments('BuyID')->comment('主键');
            $table->integer('UserID')->comment('用户ID');
            $table->integer('DoveID')->comment('鸽子ID');
            $table->integer('Offer')->comment('拍卖出价');
            $table->integer('Status')->comment('拍卖状态，0：落后，1：领先');
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
        Schema::drop('T_U_BUY');
    }
}
