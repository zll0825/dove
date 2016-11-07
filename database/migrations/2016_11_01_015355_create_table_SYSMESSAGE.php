<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSYSMESSAGE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_M_SYSMESSAGE', function (Blueprint $table) {
            $table->increments('SysID')->comment('系统消息ID');
            $table->integer('CustomerID')->comment('接收人ID');
            $table->integer('TextID')->comment('内容ID');
            $table->integer('Status')->comment('状态，0：正常；1：删除');
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
        Schema::drop('T_M_SYSMESSAGE');
    }
}
