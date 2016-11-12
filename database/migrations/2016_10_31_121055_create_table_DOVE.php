<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDOVE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('T_D_DOVEINFO', function (Blueprint $table) {
            $table->increments('DoveID')->comment('主键鸽子ID');
            $table->integer('DoveNumber')->comment('鸽子编号');
            $table->string('DoveName')->comment('鸽子名字');
            $table->string('DoveColor')->comment('鸽子羽色');
            $table->string('DoveEye')->comment('鸽子眼砂');
            $table->string('DoveRing')->comment('鸽子环号');
            $table->string('DoveSex')->comment('鸽子性别');
            $table->string('DoveIndex')->comment('鸽子目录');
            $table->string('DoveBlood')->comment('鸽子血统');
            $table->text('DoveIntro')->comment('鸽子介绍');
            $table->string('DovePicture')->comment('鸽子图片');
            $table->string('DoveBloodPicture')->comment('鸽子血统书');
            $table->integer('SaleType')->comment('出售类型，0：定价；1：拍卖；2：展示');
            $table->integer('OriginPrice')->comment('鸽子原价，分为单位');
            $table->integer('DovePrice')->comment('鸽子定价价格，分为单位');
            $table->integer('ViewCount')->comment('浏览次数');
            $table->integer('SaleFlag')->comment('卖出状态，0：正常，1：已出售，2：拍卖中，3：流拍');
            $table->integer('RecommendFlag')->comment('推荐状态，0：正常，1：已推荐');
            $table->integer('DeleteFlag')->comment('删除状态，0：正常，1：已删除');
            $table->integer('Flag')->comment('其他状态');
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
        Schema::drop('T_D_DOVEINFO');
    }
}
