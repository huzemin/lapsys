@extends('layouts.admin')

@section('content')
@if(isset($user))
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_users_list') }}">用户管理</a></li>
  <li></li>
  <li class="active">用户(管理员)资料</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
   @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class="panel panel-success" >
        <div class="panel-heading">用户资料 <span class="pull-right label label-primary">更新时间: {{$user->updated_at}}</span></div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table center" style="max-width:500px">
                    <tr>
                    <td colspan="2"><a href="{{route('admin_users_edit',array('id'=>$user->id))}}" data-toggle="tptip" title="点击跳转到用户编辑页面" class="pjaxlink"><img class="img-circle" src="{{resize($user->image,200,200)}}" style="width:80px;height:80px;"/></a></td></td>
                    </tr>
                    <tr>
                        <td><b>用户姓名</b></td><td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td><b>登录名</b></td><td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <td><b>用户邮箱</b></td><td>{{$user->email}}</td>
                    </tr>
                    <tr>
                        <td><b>角色</b></td><td>{{$user->role ? $user->role->role_name :'普通用户'}}</td>
                    </tr>
                    <tr>
                        <td><b>用户状态</b></td><td>{{$user->status ? '<span class="label label-danger">禁用</span>' :'<span class="label label-success">启用</span>'}}</td>
                    </tr>
                    <tr>
                        <td><b>登陆次数</b></td><td>{{$user->loginnum}} </td>
                    </tr>
                    <tr>
                        <td><b>登录时间</b></td><td>{{ $user->updated_at }}</td>
                    </tr>
                    <tr>
                         <td><b>登录IP</b></td><td>{{$user->loginip}}</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@else 
<ol class="breadcrumb">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_users_list') }}">用户管理</a></li>
  <li>...</li>
  <li class="active">用户(管理员)资料</li>
</ol>
<div class="container-fluid">
    <div class="panel panel-danger" >
        <div class="panel-heading"><i class="fa fa-exclamation-triangle"></i>错误</div>
        <div class="panel-body">
            <p class="alert alert-danger">用户(管理员)不存在，或者你提供的参数有误!</p>
        </div>
    </div>
</div>
@endif

@stop