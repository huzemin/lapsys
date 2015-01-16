@extends('layouts.admin')

@section('content')
@if($user)
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_users_list') }}">用户管理</a></li>
  <li>{{ $user->name ? $user->name: $user->username }}</li>
  <li class="active">编辑</li>
</ol>
<!-- 内容主体 -->

<div class="container-fluid">
      @if(Session::get('msg'))
        <p class="alert alert-success alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class ="panel panel-primary" >
        <div class="panel-heading">用户编辑</div>
        <div class="panel-body">
            {{ Form::open(array('class'=>"form-horizontal","role"=>'form','enctype'=>"multipart/form-data",'data-pjax'=>'true'))}}
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">真实姓名</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}" placeholder="真实姓名" datatype="s2-20">
                </div>
              </div>
              <div class="form-group">
              <label for="image" class="col-sm-2 control-label">用户头像</label>
                <div class="col-sm-10 col-md-4">
                  <input type="file" class="form-control" id="image" name="image">
                  <div>
                    原图片:<img src="{{resize($user->image,200,200)}}" style="width:120px;margin:10px"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">用户角色</label>
                <div class="col-sm-10 col-md-4">
                    <select name="isadmin" class="selectpicker">
                        <option value="1" {{$user->isadmin?'selected':''}}>管理员</option>
                        <option value="0" {{!$user->isadmin?'selected':''}}>普通用户</option>
                    </select>
                </div>
              </div>
              <input type="hidden" name="id" value="{{$user->id}}" />
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
  <li><a href="{{ route('admin_users_list') }}">用户管理</a></li>
</ol>
<div class="container-fluid">
    <div class="panel panel-danger" >
        <div class="panel-heading"><i class="fa fa-exclamation-triangle"></i>错误</div>
        <div class="panel-body">
            <p class="alert alert-danger">用户不存在，或者你提供的参数有误!</p>
        </div>
    </div>
</div>
@endif
@stop