<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make("html.index");
})->before('auth');

 // 用户登陆路由组
Route::group(array('before'=>'guest'), function(){
    // 登陆
    Route::post('login', array('as'=>'login','uses'=>'UserController@doLogin'));
    Route::get('login', 'UserController@showLogin');
    // 注册
    Route::get('register', 'UserController@showRegister');
    Route::post('register', array('as'=>'register','uses'=>'UserController@doRegister'));
});

// 检查授权(登陆后可以访问)
Route::group(array('before'=>'auth'), function(){
    Route::get('logout', 'UserController@doLogout')->before('auth');
});

// 不通过过滤器
Route::post('api/ucheck',array('as'=>'ucheck','uses'=>'UserController@checkValid')); // 检查用户邮箱是否可用

Route::get('db',function(){
});
