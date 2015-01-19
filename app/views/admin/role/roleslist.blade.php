@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_roles_list') }}">角色管理</a></li>
  <li class="active">角色列表</li>
</ol>

<!-- 内容主体 -->
<div class="container-fluid">
    @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class="panel panel-default" >
        <div class="panel-heading">角色列表  <span class="pull-right label label-primary"> 角色总数:{{$total}}</span></div>
        <div class="panel-body">
            <div class="list-search text-right">
            <form class="form-inline" action="{{ route('admin_roles_list') }}"role="form" method="get" data-pjax=true>
                <div class="form-group">
                    <label class="sr-only" for="s-keyword">Keyword</label>
                    <input type="text" class="form-control" name='keyword' value="{{ $keyword }}" id="s-keyword" placeholder="请输入关键词">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
                <a href="{{ route('admin_roles_add') }}" class="btn btn-success">创建新角色</a>
            </div>
            </form>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <legend>角色列表</legend>
                    <thead>
                        <tr>
                            <th data-toggle="tptip" title="角色ID">#</th>
                            <th>角色名称</th>
                            <th>状态</th>
                            <th>最后操作者</th>
                            <th>创建时间</th>
                            <th>修改时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($roles as $role) 
                        <tr @if($role->status == -1) class="danger" @endif>
                            <td>{{$role->id}}</td>
                            <td>{{$role->role_name}}</td>
                            <td>
                                @if($role->status == 1)
                                    <span class="label label-success">正常</span>
                                @elseif($role->status == 0)
                                    <span class="label label-warning">筹备</span>
                                @elseif($role->status == -1)
                                    <span class="label label-default">禁用</span>
                                @endif
                            </td>
                            <td>{{ $role->user ? $role->user->username :''}}</td>
                            <td>{{date('Y-m-d H:m',strtotime($role->created_at))}}</td>
                            <td>{{date('Y-m-d H:m',strtotime($role->updated_at))}}</td>
                            <td>
                                @if(!in_array($role->role_name,$roleexcept))
                                {{ link_to_route('admin_roles_edit','编辑',array('id'=>$role->id),array('class'=>'pjaxlink'))}} {{ link_to_route('admin_roles_auth', '授权' ,array('id'=>$role->id),array('class'=>'ta pjaxlink')) }} {{ link_to_route('admin_roles_delete','删除',array('id'=>$role->id),array('class'=>'ta delete','data-pjax'=>'delete')) }}
                                @else
                                    <span data-toggle="tptip" title="无法编辑" class="label label-danger">最高权限</span>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($roles) == 0)
                    <p class="alert alert-warning text-center">无数据</p>
                @endif
            </div>
            <div class="center">
            {{$roles->links()}}
            </div>
        </div>
    </div>
</div>

@stop