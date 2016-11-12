<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('userid')->comment('用户id主键');
            $table->string('username')->commet('用户名');
            $table->string('phonenumber')->unique()->comment('手机号');
            $table->string('password', 60)->comment('密码');
            $table->integer('certifystate')->comment('认证状态，10：注册用户，0：已上传图片待认证，1：已认证，2：已冻结；9：不通过')->default(10);
            $table->integer('freezestate')->comment('冻结状态，0：正常，1：冻结')->default(3);
            $table->integer('deposit')->comment('保证金');
            $table->string('depositpicture')->comment('保证金图片');
            $table->string('idcardpicture')->comment('身份证图片');
            $table->string('userpicture')->comment('头像');
            $table->rememberToken()->comment('登录token');
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
        Schema::drop('users');
    }
}
