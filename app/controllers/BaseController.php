<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	// 全局初始化
	public function getGdata() {
		$gdata = array(
			'client_ip' => get_client_ip()
		);
		if(Auth::check()) {
			$gdata['uname'] = Auth::user()->name ? Auth::user()->name: Auth::user()->username;
			$gdata['ulogo'] = Auth::user()->image;
			$gdata['role_name'] = Auth::user()->role->role_name;
			// 获取上次登陆时间和IP
			$gdata['last_login_time'] = Session::get('last_login_time') ? Session::get('last_login_time') : Auth::user()->updated_at->toDateTimeString();
			$gdata['last_login_ip'] = Session::get('last_login_ip') ? Session::get('last_login_ip') : Auth::user()->loginip;
		}
		return $gdata;
	}
}