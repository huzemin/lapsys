@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_users_list') }}">用户管理</a></li>
  <li>管理员管理</li>
  <li class="active">管理员列表</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
   @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class="panel panel-default" >
        <div class="panel-heading">管理员列表 <span class="pull-right label label-primary">管理员总数:{{$total}}</span></div>
        <div class="panel-body">
            <div class="list-search text-right">
            <form class="form-inline" action="{{ route('admin_users_manager') }}"role="form" method="get" data-pjax=true>
                <div class="form-group">
                    <label class="sr-only" for="s-keyword">Keyword</label>
                    <input type="text" class="form-control" name='keyword' value="{{ $keyword }}" id="s-keyword" placeholder="请输入关键词">
                </div>
               <!--  <select name='orderby' class="selectpicker show-menu-arrow" title="排序方式">
                      <option>用户名升序</option>
                      <option>用户名降序</option>
                      <option>注册时间升序</option>
                      <option>注册时间降序</option>
                </select> -->
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <caption>管理员列表</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>管理员</th>
                            <th>角色</th>
                            <th>登陆名</th>
                            <th>邮箱</th>
                            <th>管理员状态</th>
                            <th>登陆次数</th>
                            <th>注册时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user) 
                        <tr @if($user->isadmin) class="info" @endif>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{isset($user->role_id) ? (isset($user->role->role_name) ? $user->role->role_name:'普通用户'): '普通用户' }}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if($user->status == 0)
                                    <span class="label label-info">正常</span>
                                @elseif($user->status == -1)
                                    <span class="label label-info">禁用</span>
                                @endif
                            </td>
                            <td>{{$user->loginnum}}</td>
                            <td>{{date('Y-m-d H:m',strtotime($user->created_at))}}</td>
                            <td>{{ link_to_route('admin_users_profile','查看',array('id'=>$user->id),array('class'=>'ta pjaxlink')) }} {{ link_to_action('UserController@showUsersEdit','编辑',array('id'=>$user->id),array('class'=>'ta pjaxlink'))}} {{ link_to_route('admin_users_delete','删除',array('id'=>$user->id), array('class'=>'ta','data-pjax'=>'delete','data-toggle'=>'rptip','title'=>'警告:删除无法复原!')) }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($users) == 0)
                    <p class="alert alert-warning text-center">无数据</p>
                @endif
            </div>
            <div class="center">
            {{$users->links()}}
            </div>
        </div>
    </div>
</div>

@stop