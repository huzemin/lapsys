<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	//
});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::guest('login');
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) 
        return Redirect::to('/');
});

// 判断用户是否有权限进入管理后台
Route::filter('admin', function(){
	if(Auth::check()) {
		// 判断是否为管理员
		if(!Auth::user()->role) {
			return View::make('admin.forbidden');
		}

		if(!Auth::user()->isAdmin() || Auth::user()->role->status != 1 ) {
			return View::make('admin.forbidden');
		}
		
		// 判断是否有权限访问
		$role = Auth::user()->role;
		$auth = $role->auth;
		$auth_except = Config::get('auth.auth_except', array());
		$auth_role_except = Config::get('auth.auth_role_except', array());
		$auth_except = Config::get('auth.auth_except', array());
		$_current_method = Request::method();
		$_current_uri = Route::getCurrentRoute()->getURI();
		$_uri = preg_replace('#[^\w]#', '_', $_current_uri);
		// 不检查权限设置直接可以访问:最高权限Root
		if(in_array($_uri, $auth_except) || in_array($role->role_name, $auth_role_except)){
			return;
		}
		if(!empty($auth)) {
			$auth = unserialize($auth);
			if(isset($auth[$_uri]) && isset($auth[$_uri]['auth']) && in_array($_current_method, $auth[$_uri]['auth'])) {
				return;
			}
		}
		return View::make('admin.role.forbidden', array('rolename'=> $role->role_name));
	} else {
		return Redirect::to('login');
	}
});
/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function()
{
	if (Session::token() != Input::get('_token'))
	{
		throw new Illuminate\Session\TokenMismatchException;
	}
});