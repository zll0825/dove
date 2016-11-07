<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableAUTH extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_AS_AUTH', function (Blueprint $table) {
            $table->increments('Auth_ID')->comment('权限ID');
            $table->string('AuthName')->comment('权限名字');
            $table->integer('Level')->comment('权限级别');
            $table->string('Path')->comment('权限路由');
            $table->integer('PID')->comment('父级ID');
            $table->string('Class')->comment('类名');
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
        Schema::drop('T_AS_AUTH');
    }
}
