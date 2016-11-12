<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTHEMEAUCTION extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_D_THEMEAUCTION', function (Blueprint $table) {
            $table->increments('ID')->comment('主键');
            $table->integer('ThemeID')->comment('主题ID');
            $table->integer('AuctionID')->comment('鸽子竞拍ID');
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
        Schema::drop('T_D_THEMEAUCTION');
    }
}
