<?php
class UserController extends BaseController {
    // 全局数据
    public $gdata;

    // 用户模型
    public $user; 

    public function __construct(User $user) {
        $this->user = $user;
        $this->gdata = $this->getGdata();
    }

    // 用户登陆界面
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

            $_user = $this->user->where('username','=',Input::get('username'))->first();
            // 判断用户是否存在
            if($_user) {
                // 如何是管理员则不允许设置记住密码
                if($_user->isAdmin()) {
                    $remember = Config::get('web.admin.remember', false);
                }
                 // 用户存在
                if(Auth::attempt($credentials, $remember)) {
                    if($_user->isAdmin()) {
                        return Redirect::route('admin');
                    }
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
         // 数据验证
        $rule = array(
                'username'=>'required|alpha_dash|min:3|max:20',
                'password'=>'required|alpha_dash|confirmed|min:6',
                'email'=>'required|email'
            );
        $validator = Validator::make(Input::all(), $rule);
        if($validator->fails()) {
            return Redirect::to("register")->withErrors($validator)->withInput(Input::except(array('password','password_confirmation')));
        } else {
            // 二次验证
            // 邮箱和密码
            $hasUser = $this->user->where('username',Input::get('username'))->orWhere('email',Input::get('username'))->count();
            if($hasUser > 0) {
                $errors = array('register'=> '用户名或者电子邮箱已经存在！');
                return Redirect::to("register")->withErrors($errors)->withInput(Input::except(array('password','password_confirmation')));
            }else {
                // 添加用户
                $this->user->username = Input::get('username');
                $this->user->email    = Input::get('email');
                $this->user->password = Hash::make(Input::get('password'));
                if($this->user->save()) {
                    return Redirect::to('login')->with('regmsg','用户注册成功, 请登录！')->withInput(array('username'=>Input::get('username')));
                } else {
                    $errors = array('register'=> '用户添加失败,请重试！');
                    return Redirect::to("register")->withErrors($errors)->withInput(Input::except(array('password','password_confirmation')));
                }
            }
        }
    }

    public function checkValid() {
        // 支持 Validform ajax验证
        $param = Input::get('param');
        $name = Input::get('name');
        // 验证邮箱
        if($name == 'email'){
            if(empty($param) || !valid_email($param)) {
                $data = array('success'=>0,'info'=>'邮箱地址不能为空或者格式错误!','status'=>'n');
            } else {
                $user = $this->user->where('email',$param)->count();
                if($user > 0) {
                    $data = array('success'=>0,'info'=>'邮箱地址已被使用!','status'=>'n');
                } else {
                    $data = array('success'=>1,'info'=>'邮箱地址可用!','status'=>'y');
                }
            }
        } elseif($name == 'username') {
            if(empty($param)) {
                $data = array('success'=>0,'info'=>'用户名不能为空!','status'=>'n');
            } else {
                $user = $this->user->where('username',$param)->count();
                if($user > 0) {
                    $data = array('success'=>0,'info'=>'用户名已被使用!','status'=>'n');
                } else {
                    $data = array('success'=>1,'info'=>'用户名可用!','status'=>'y');
                }
            }
        } else {
            $data = array('success'=>0,'info'=>'参数错误!','status'=>'n');
        }
        return Response::json($data);
    }

    /*==============================================
     *  用户功能后台功能
     * ============================================*/

    // 用户列表
    public function usersList() {
    }
}