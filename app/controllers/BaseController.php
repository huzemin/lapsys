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
		}
		return $gdata;
	}
}