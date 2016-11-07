<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMESSAGE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_M_MESSAGE', function (Blueprint $table) {
            $table->increments('MessageID')->comment('信息ID');
            $table->integer('SendID')->comment('发送人ID');
            $table->integer('RecID')->comment('接收人ID');
            $table->integer('TextID')->comment('内容ID');
            $table->integer('Status')->comment('接受状态，0：未读，1：已读，2：删除');
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
        Schema::drop('T_M_MESSAGE');
    }
}
