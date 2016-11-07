<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMESSAGETEXT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_M_MESSAGETEXT', function (Blueprint $table) {
            $table->increments('TextID')->comment('内容ID');
            $table->string('Title')->comment('标题');
            $table->string('Text')->comment('内容');
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
        Schema::drop('T_M_MESSAGETEXT');
    }
}
