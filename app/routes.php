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
    Route::get('/users/delete/{id}', array('as'=>'admin_users_delete','uses'=>'UserController@doUsersDelete'));
  

    // 权限设置
    Route::get('/roles', array('as'=>'admin_roles_list', 'uses'=>'RoleController@show'));
    Route::get('/roles/edit/{id}', array('as'=>'admin_roles_edit', 'uses'=>'RoleController@showEdit'));
    Route::post('/roles/edit/{id}', array('uses'=>'RoleController@doEdit'));

    Route::get('/roles/add', array('as'=>'admin_roles_add', 'uses'=>'RoleController@add'));
    Route::post('/roles/add', array('uses'=>'RoleController@add'));

    Route::get('/roles/delete/{id}', array('as'=>'admin_roles_delete','uses'=>'RoleController@delete'));

    Route::get('/roles/auth/{id}', array('as'=>'admin_roles_auth','uses'=>'RoleController@showAuth'));
    Route::post('/roles/auth/{id}', array('uses'=>'RoleController@doAuth'));

    // 管理员列表
    Route::get('/users/manager', array('as'=>'admin_users_manager','uses'=>'UserController@showManager'));
    // 个人资料
    Route::get('/users/profile/{id?}', array('as'=>'admin_users_profile','uses'=>'UserController@showProfile'));

    // 文章管理
    Route::get('/articles/preview/{id}',array('as'=>'admin_artilces_preview','uses'=>'ArticleController@showPreview'));
    Route::get('/articles', array('as'=>'admin_articles_list', 'uses'=>'ArticleController@show'));
    Route::get('/articles/add', array('as'=>'admin_articles_add', 'uses'=>'ArticleController@showAdd'));
    Route::post('/articles/add', array('uses'=>'ArticleController@doAdd'));
    Route::get('/articles/edit/{id}', array('as'=>'admin_articles_edit', 'uses'=>'ArticleController@showEdit'));
    Route::post('articles/edit/{id}', array('uses'=>'ArticleController@doEdit'));
    Route::get('/articles/delete/{id}', array('as'=>'admin_articles_delete', 'uses'=>'ArticleController@delete'));

});

// api不通过过滤器
Route::post('api/ucheck',array('as'=>'ucheck','uses'=>'UserController@checkValid')); // 检查用户邮箱是否可用

// 测试路由文件导入 prefix_route = 'test'
require_once 'route_test.php';