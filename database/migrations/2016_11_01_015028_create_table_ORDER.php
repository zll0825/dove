<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableORDER extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_U_ORDER', function (Blueprint $table) {
            $table->increments('OrderID')->comment('主键');
            $table->string('OrderNumber')->comment('订单号');
            $table->integer('UserID')->comment('用户ID');
            $table->integer('DoveID')->comment('鸽子ID');
            $table->integer('AuctionID')->comment('竞拍鸽子ID');
            $table->integer('OrderType')->comment('订单类型，0：定价；1：拍卖');
            $table->integer('OrderPrice')->comment('订单价格');
            $table->string('PayPicture')->comment('付款凭证');
            $table->integer('PayFlag')->comment('付款状态，0：加入购物车，1：未付款，2：已传凭证等待审核，3：审核通过，已付款，4：审核不通过，请重新上传，5：已发货，6：已签收');
            $table->integer('SendFlag')->comment('发货状态，0：未发货，1：已发货');
            $table->integer('ReceiveFlag')->comment('收获状态，0：未收货，1：已收货');
            $table->integer('Flag')->comment('其他状态');
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
        Schema::drop('T_U_ORDER');
    }
}
