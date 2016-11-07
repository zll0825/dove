<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUSER extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_AS_USER', function (Blueprint $table) {
            $table->increments('id')->comment('主键');
            $table->string('Name')->comment('用户名');
            $table->string('Email')->comment('邮箱');
            $table->string('PhoneNumber')->comment('手机号');
            $table->string('PassWord')->comment('密码');
            $table->string('Department')->comment('部门');
            $table->integer('Status')->comment('状态');
            $table->integer('RoleID')->comment('角色ID');
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
        Schema::drop('T_AS_USER');
    }
}
