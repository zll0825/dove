<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCONTENT extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_C_CONTENT', function (Blueprint $table) {
            $table->increments('ContentID')->comment('内容ID');
            $table->integer('CategoryID')->comment('所属栏目ID');
            $table->text('Content')->comment('内容');
            $table->string('Author')->comment('作者');
            $table->integer('ViewCount')->comment('浏览数');
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
        Schema::drop('T_C_CONTENT');
    }
}
