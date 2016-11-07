<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCATEGORY extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_C_CATEGORY', function (Blueprint $table) {
            $table->increments('CategoryID')->comment('栏目ID');
            $table->string('CategoryName')->comment('栏目名称');
            $table->integer('PID')->comment('父级栏目ID');
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
        Schema::drop('T_C_CATEGORY');
    }
}
