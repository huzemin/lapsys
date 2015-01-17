@extends('layouts.admin')

@section('content')
@if(isset($role))
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_roles_list') }}">角色管理</a></li>
  <li>{{ $role->role_name ? $role->role_name: '角色' }}</li>
  <li class="active">编辑</li>
</ol>
<!-- 内容主体 -->

<div class="container-fluid">
    @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class ="panel panel-primary" >
        <div class="panel-heading">角色编辑</div>
        <div class="panel-body">
            {{ Form::open(array('class'=>"form-horizontal","role"=>'form','enctype'=>"multipart/form-data",'data-pjax'=>'true'))}}
              <div class="form-group">
                <label for="role_name" class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" id="role_name" name="role_name" value="{{$role->role_name}}" placeholder="角色名称" datatype="s2-20">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">角色状态</label>
                <div class="col-sm-10 col-md-4">
                    <select name="status" class="selectpicker">
                        <option value="1" @if($role->status == 1) selected @endif>启用</option>
                        <option value="0" @if($role->status == 0) selected @endif>筹备</option>
                        <option value="-1" @if($role->status == -1) selected @endif>禁用</option>
                    </select>
                </div>
              </div>
              <input type="hidden" name="id" value="{{$role->id}}" />
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">保存</button>
                  <button type="reset" class="btn btn-danger">重置</button>
                </div>
              </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@else 
<ol class="breadcrumb">
  <li><a href="#">主页</a></li>
  <li><a href="{{ route('admin_roles_list') }}">角色管理</a></li>
</ol>
<div class="container-fluid">
    <div class="panel panel-danger" >
        <div class="panel-heading"><i class="fa fa-exclamation-triangle"></i>错误</div>
        <div class="panel-body">
            <p class="alert alert-danger">角色不存在，或者你提供的参数有误!</p>
        </div>
    </div>
</div>
@endif
@stop