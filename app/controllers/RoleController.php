<?php
/** 角色管理 */
class RoleController extends BaseController {
    // 全局数据
    public $gdata; 
    // Role模型
    public $role;  
    public function __construct(Role $role) {
        $this->gdata = parent::getGdata();
        $this->role = $role;
    }

    public function show() {
        // 在配置文件中设置得最高权限角色，不能编辑和修改
        $auth_role_except = Config::get('auth.auth_role_except', array());
        // 关键词搜索
        $keyword = Input::get('keyword','');
        if(!empty($keyword)) {
          $Erole = $this->role->where('role_name','like',"%$keyword%");
        } else {
           $Erole = $this->role;
        }

        $roles = $Erole->orderBy('status','desc')->orderBy('created_at','desc')->paginate(15);

        // 分页参数添加自定义信息
        if(!empty($keyword)) {
            $roles->appends(array('keyword' => $keyword));
        }
        $this->gdata['roles'] = $roles;
        $this->gdata['total'] = $roles->getTotal();
        return View::make('admin.role.roleslist',$this->gdata)->withKeyword($keyword)->withRoleexcept($auth_role_except);
    }
    // 角色基本信息编辑
    public function showEdit($id) {
        $role = $this->role->find($id);
        $this->gdata['role'] = $role;
        return View::make('admin.role.rolesedit', $this->gdata);
    }
    // 角色基本编辑保持
    public function doEdit($id) {
        $role = $this->role->find($id);
        if($role) {
            $role_id = Input::get('id');
            if($id == $role_id) {
                $role->role_name = Input::get('role_name');
                $role->status = Input::get('status');
                $role->updated_user = Auth::id();
                if($role->save()) {
                    $alert = "success";
                    $msg = '角色更新成功！';
                }  
            } 
        }
        if(!isset($msg)){
            $alert = "danger";
            $msg = '角色更新出错！';
        }
        return Redirect::route('admin_roles_edit', array('id'=>$id))->with('msg',$msg)->with('alert',$alert);
    }

    public function add() {
        $role_name = Input::get('role_name');
        if(isset($role_name)) {
            $this->role->role_name = $role_name;
            $this->role->status = Input::get('status');
            $this->role->updated_user = Auth::id();
            if($this->role->save()) {
                $alert = "success";
                $msg = "角色创建成功!";
            } else {
                $alert = "danger";
                $msg = "角色创建失败!";
            }

            return Redirect::route('admin_roles_list')->with('msg',$msg)->with('alert',$alert);
        }
        return View::make('admin.role.rolesadd',$this->gdata);
    }

    // 删除角色
    public function delete($id) {
        $role = $this->role->find($id);
        if($role){
            if($role->delete()) {
                $alert = "success";
                $msg = "角色删除成功！";
            }
        }
        if(!isset($msg)) {
            $alert = "danger";
            $msg = "角色删除失败！";
        }

        return Redirect::route('admin_roles_list')->with('msg',$msg)->with('alert',$alert);
    }

    // 角色授权
    public function showAuth($id) {
        $role = $this->role->find($id);
        // title url method
        // 权限设置
        if($role) {
            // 具有全部权限直接提示
            $auth_role_except = Config::get('auth.auth_role_except', array());
            if(in_array($role->role_name, $auth_role_except)){
                 $this->gdata['root'] = true;
                 $this->gdata['role'] = $role;
                return View::make('admin.role.rolesauth',$this->gdata);
            }
            $_authes = $role->auth;
            if(!empty($_authes)){
                $_authes = unserialize($_authes);
            } else {
                $_authes = array();
            }
        }

        $authes = array();
        // 全局的权限
        $routes = Route::getRoutes();
        foreach($routes->getRoutes() as $route) {
            // 后台授权路由
            if(preg_match('#^(/?)admin/(.*)#', $route->getURI())){
                $uri = $route->getURI();
                $_uri = preg_replace('#[^\w]#', '_', $uri);
                if(array_key_exists($_uri, $authes)) {
                    $authes[$_uri]['auth'] = array_merge($route->getMethods(), $authes[$_uri]['auth']);
                } else {
                    $authes[$_uri] = array(
                            'uri' => $uri,
                            'auth' => $route->getMethods(),
                    );
                }
            }
        }

        foreach ($authes as $key => &$val) {
            $val['title'] = '暂无';
            $auth = array();
            foreach($val['auth'] as $method) {
                if(isset($_authes[$key]['auth']) && in_array($method, $_authes[$key]['auth'])) {
                    $auth[$method] = 'selected';
                } else {
                    $auth[$method] = '';
                }
            }
            $val['auth'] = $auth;
        }
        $this->gdata['role'] = $role;
        $this->gdata['authes'] = $authes;
        return View::make('admin.role.rolesauth',$this->gdata);
    }

    public function doAuth($id) {
        $data = Input::all();
        $_id = $data['id'];
        if(isset($data['_token'])) {
            unset($data['_token']);
        }
        $sdata = serialize($data);
        $role = $this->role->find($id);
        if(isset($_id) && $id == $_id && $role) {
            $role->backup = $role->auth;
            $role->auth = $sdata;
            $role->updated_user = Auth::id();
            if($role->save()) {
                $alert = "success";
                $msg = "角色权限更新成功！";
            }
        }
        if(!isset($msg)) {
            $alert = "danger";
            $msg = "角色权限更新失败！";
        }
        return Redirect::route('admin_roles_auth',array('id'=>$id))->with('msg',$msg)->with('alert',$alert);
    }
}