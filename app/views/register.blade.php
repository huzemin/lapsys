@extends('layouts.main')

@section('styleload')
  <link rel="stylesheet" href="{{ asset('css/validform.css') }}" />
@stop

@section('content')
<!-- 登陆界面 -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-push-4 page-top">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title text-center">用户注册</h3>
              </div>
              <div class="panel-body">
                @foreach($errors->all() as $error)
                    <p class="alert alert-danger"><i class="glyphicon glyphicon-warning-sign"></i>{{$error}}</p>
                @endforeach
                {{ Form::open(array('url'=>URL::route("register"),'method'=>'post','class'=>'form','role'=>'form'))}}
                 <div class="form-group">
                    <label class="sr-only" for="email">邮箱</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="电子邮箱" value="{{ Input::old('email') }}" datatype="e" ajaxurl="{{route('ucheck')}}">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="username">用户名</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="用户名" value="{{ Input::old('username') }}" datatype="*3-20"  ajaxurl="{{route('ucheck')}}">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="密码" datatype="*6-20">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password_confirmation">确认密码</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="确认密码" datatype="*3-20" recheck="password">
                  </div>
                  <button type="submit" class="btn btn-info btn-block">注册</button>
                {{Form::close()}}
                  <div>
                        <p class="p1">已拥有账号? <a href="{{route('login')}}">登陆</a></p>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@stop

@section('jsload')
<script type="text/javascript" src="{{ asset('js/Validform.min.js') }}"></script>
<script type="text/javascript">
  $(document).ready(function(){
      $('form').Validform({
        label:"label",
        showAllError:true,
        tiptype:5
      });
  });
</script>
@stop