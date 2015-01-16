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
    return View::make('hello');
});

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
    Route::get('logout', array('use'=>'logout','uses'=>'UserController@doLogout'));
});

// 后台管理
Route::group(array('before'=>'auth|admin','prefix'=>'admin'), function(){
    Route::get('/', array('as'=>'admin', 'uses'=>'AdminController@showHome'));
    // 用户列表
    Route::get('/users', array('as'=>'admin_users_list','uses'=>'UserController@usersList'));

    Route::get('/users/edit/{id}', array('as'=>'admin_users_edit','uses'=>'UserController@showUsersEdit'));
    Route::post('/users/edit/{id}', array('uses'=>'UserController@doUsersEdit'));
});

// api不通过过滤器
Route::post('api/ucheck',array('as'=>'ucheck','uses'=>'UserController@checkValid')); // 检查用户邮箱是否可用

Route::get('upload', function(){
    if(Input::file())
        dd(Input::file("file"));
    return View::make('html.upload');
});

Route::get('db',function(){
    $file = '/uploads/avatar/20150116/14213877919623.jpg';
    pf(\Lib\File::resize($file,100,100,'adapter'));
});

Route::post('upload', function(){
    $file = Input::file('file');
    pf(do_upload('file','avatars'));
    return View::make('html.upload');
});