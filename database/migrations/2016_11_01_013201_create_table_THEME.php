<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTHEME extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_D_THEME', function (Blueprint $table) {
            $table->increments('ThemeID')->comment('专题ID');
            $table->string('ThemeName')->comment('专题名称');
            $table->string('ThemeHost')->comment('专题商家');
            $table->string('HostLocation')->comment('商家地点');
            $table->string('HostPhone')->comment('商家联系方式');
            $table->integer('EndFlag')->comment('专题结束标记');
            $table->integer('DeleteFlag')->comment('专题删除标记');
            $table->dateTime('StartTime')->comment('专题开始时间');
            $table->dateTime('EndTime')->comment('专题结束时间');
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
        Schema::drop('T_D_THEME');
    }
}
