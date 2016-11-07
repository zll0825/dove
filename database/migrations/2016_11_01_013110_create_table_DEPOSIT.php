<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDEPOSIT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_U_DEPOSIT', function (Blueprint $table) {
            $table->increments('DepositID')->comment('保证金主键ID');
            $table->integer('UserID')->comment('用户ID');
            $table->integer('Deposit')->comment('保证金分为单位');
            $table->integer('Status')->comment('状态，0：正常；1：冻结');
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
        Schema::drop('T_U_DEPOSIT');
    }
}
