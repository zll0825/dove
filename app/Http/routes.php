<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
// 认证路由...
Route::get('/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');
// 注册路由...
Route::get('/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

// 首页
Route::get('/', 'IndexController@index');

// 拍卖首页
Route::get('/auction', 'AuctionController@index');
// 拍卖专题介绍
Route::get('/auction/intro', 'AuctionController@intro');
// 拍卖鸽子详情
Route::get('/auction/{id}', 'AuctionController@info');

// 新闻首页
Route::get('/news', 'NewsController@index');
// 新闻详情
Route::get('/news/{id}', 'NewsController@info');

// 定价鸽子首页
Route::get('/sale', 'DoveController@indexSale');
// 定价鸽子详情
Route::get('/sale/{id}', 'DoveController@infoSale');
// 展示鸽子首页
Route::get('/show', 'DoveController@indexShow');
// 展示鸽子详情
Route::get('/show/{id}', 'DoveController@infoShow');

// 帮助中心
Route::get('/help', 'IndexController@help');
//图片上传
Route::any('/ucenter/upload', 'HelpController@upload');//上传图片
Route::post('/avatar/upload','HelpController@avatarUpload');


//帮助路由
//发送验证码(死)
Route::post('/help/sms', 'HelpController@sms');
//发送验证码（活）
Route::post('/smscode', 'HelpController@sms');


//需要登录后访问的路由
Route::group(['middleware'=>'auth'], function(){
    //个人中心首页
    Route::get('/ucenter/index', 'UserController@index');
    //我的竞拍
    Route::get('/ucenter/myauction', 'UserController@myauction');
    //我的购买
    Route::get('/ucenter/myorder', 'UserController@myorder');
    //系统消息
    Route::get('/ucenter/mymsg', 'UserController@mymsg');
});