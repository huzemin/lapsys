@extends('layouts.admin')

@section('content')

<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_roles_list') }}">角色管理</a></li>
  <li class="active">创建</li>
</ol>
<!-- 内容主体 -->

<div class="container-fluid">
    <div class ="panel panel-primary" >
        <div class="panel-heading">角色创建</div>
        <div class="panel-body">
            {{ Form::open(array('class'=>"form-horizontal","role"=>'form','enctype'=>"multipart/form-data",'data-pjax'=>'true'))}}
              <div class="form-group">
                <label for="role_name" class="col-sm-2 control-label">角色名称</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" id="role_name" name="role_name" value="" placeholder="角色名称" datatype="s2-20">
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">角色状态</label>
                <div class="col-sm-10 col-md-4">
                    <select name="status" class="selectpicker">
                        <option value="1">启用</option>
                        <option value="0" selected>筹备</option>
                        <option value="-1">禁用</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button type="submit" class="btn btn-primary">创建</button>
                  <button type="reset" class="btn btn-danger">重置</button>
                </div>
              </div>
            {{Form::close()}}
        </div>
    </div>
</div>
@stop