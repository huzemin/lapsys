@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb">
  <li><a href="#">主页</a></li>
  <li><a href="#">用户管理</a></li>
  <li class="active">用户列表</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
    <div class="panel panel-default" >
        <div class="panel-heading">用户列表 <span class="pull-right label label-primary">用户总数:{{$total}}</span></div>
        <div class="panel-body">
            <div class="list-search text-right">
            <form class="form-inline" role="form" method="get">
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
                <table class="table table-hover">
                    <legend>用户列表</legend>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>用户名</th>
                            <th>登陆名</th>
                            <th>邮箱</th>
                            <th>用户状态</th>
                            <th>注册时间</th>
                            <th>登陆次数</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user) 
                        <tr @if($user->isadmin) class="info" @endif>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
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
                            <td>{{ link_to('user/edit','编辑',array('class'=>'ta'))}} {{ link_to('user/edit','禁用',array('class'=>'ta'))}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="center">
            {{$users->links()}}
            </div>
        </div>
    </div>
</div>

@stop