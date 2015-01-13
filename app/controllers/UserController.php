<?php
class UserController extends BaseController {

    // 用户模型
    public $user; 

    public function __construct(User $user) {
        $this->user = $user;
    }

    public function showLogin() {
        return View::make('login')->with('pagetitle','用户登陆');
    }

    public function doLogin() {
        // 数据验证
        $rule = array(
                'username'=>'required|alpha_dash|min:3|max:20',
                'password'=>'required|alpha_dash|min:6'
            );
        $validator = Validator::make(Input::all(), $rule);
        if($validator->fails()) {
            return Redirect::to("login")->withErrors($validator)->withInput(Input::except('password'));
        } else {
            $credentials = array(
                'username' =>Input::get('username'),
                'password' => Input::get('password')
            );
            // 是否记住密码
            $remember = Input::get('remember') ? true : false;
            // 判断用户是否存在
            if($this->user->where('username','=',Input::get('username'))->count()) {
                 // 用户存在
                if(Auth::attempt($credentials, $remember)) {
                    return Redirect::to('/');
                } else {
                    // 登陆失败
                    $errors = array('login'=>'用户名或密码错误');
                }
            } else {
                $errors = array('login'=>'用户不存在!');
            }

            return Redirect::to("login")->withErrors($errors)->withInput(Input::except('password'));
           
        }
    }

    // 注销
    public function doLogout() {
        if(Auth::check())
            Auth::logout();
        return Redirect::to('/');
    }

    // 用户注册
    public function showRegister() {
        return View::make('register')->with('pagetitle','注册');
    }

    public function doRegister() {
        dd(Input::all());
    }
}