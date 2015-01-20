@extends('layouts.admin')

@section('content')
@if(isset($role))
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_roles_list') }}">角色管理</a></li>
  <li>{{$role->role_name}}</li>
  <li class="active">角色授权</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
    @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class="panel panel-default" >
        <div class="panel-heading">角色授权表</div>
        <div class="panel-body">
            @if(!isset($root))
            <div class="table-responsive">
                  {{ Form::open(array('class'=>"form-horizontal","role"=>'form','enctype'=>"multipart/form-data",'data-pjax'=>'true'))}}
                <table class="table table-hover table-striped table-bordered">
                    <caption>角色列表</caption>
                    <thead>
                        <tr>
                            <th colspan="2">路由名称/路由URI</th>
                            <th>方法授权</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($authes as $key => $auth) 
                        <tr>
                            <td colspan="2">
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" name="{{$key}}[title]" value="{{$auth['title']}}" placeholder="路由名称">
                                    <span class="input-group-addon">{{$auth['uri']}}</span>
                                </div>
                            </td>
                            <td>
                                <select name="{{$key}}[auth][]" class="selectpicker show-tick" multiple data-container="body" data-style="btn-primary" style="display:none">
                                 @foreach($auth['auth'] as $key => $select)
                                    <option value="{{$key}}" {{$select}}>{{$key}}</option>
                                 @endforeach
                                </select>
                            </td>
                            <td>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                    <td colspan="3">
                        <input type="hidden" name="id" value="{{$role->id}}" />
                          <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                              <button type="submit" class="btn btn-primary">保存</button>
                              <button type="reset" class="btn btn-danger">重置</button>
                            </div>
                          </div>
                    </td>
                    </tr>
                    </tfoot>
                </table>
                {{Form::close()}}
                @if(count($authes) == 0)
                    <p class="alert alert-warning text-center">无数据</p>
                @endif
            </div>
            @else
            <div class="alert alert-danger">
            <strong>警告:</strong>此用户具有系统的最高权限,且不可更改!(配置中设置)</div>
            @endif
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