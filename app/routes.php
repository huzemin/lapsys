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
    return View::make("hello");
})->before('auth');

 // 用户登陆路由组
Route::group(array('before'=>'guest'), function(){
    Route::post('login', array('as'=>'login','uses'=>'UserController@doLogin'));
    Route::get('login', 'UserController@showLogin');

    Route::get('register', 'UserController@showRegister');
    Route::post('register', array('as'=>'register','uses'=>'UserController@doRegister'));
});

Route::group(array('before'=>'auth'), function(){
    Route::get('logout', 'UserController@doLogout')->before('auth');
});

Route::get('db',function(){
    
    return lang('test.website');
});