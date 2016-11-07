<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableROLE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_AS_ROLE', function (Blueprint $table) {
            $table->increments('id')->comment('角色ID');
            $table->string('RoleName')->comment('角色名称');
            $table->integer('Status')->comment('角色状态');
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
        Schema::drop('T_AS_ROLE');
    }
}
