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

// 用户登陆路由
Route::get('login', 'UserController@showLogin');

Route::post('login', array('as'=>'login','uses'=>'UserController@doLogin'));