<?php
class UserController extends BaseController {

    public function showLogin() {
        return View::make('login')->with('pagetitle','用户登陆');
    }

    public function doLogin() {
        // 数据验证
        $rule = array(
                'username'=>'required|alpha|min:3|max:20',
                'password'=>'required|alpha|min:6'
            );
        $validator = Validator::make(Input::all(), $rule);
        if($validator->fails()) {
            return Redirect::to("login")->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $credentials = array(
                'username' =>Input::get('username'),
                'password' => Input::get('password')
            );
            if(Auth::attempt($credentials)) {

            } else {
                // 登陆失败
                 return Redirect::to("login")->withErrors(array('login'=>'用户名或密码错误'))->withInput(Input::except('password'));
            }
        }
    }
}