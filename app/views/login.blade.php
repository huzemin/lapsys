@extends('layouts.main')

@section('styleload')
  <link rel="stylesheet" href="{{ asset('css/validform.css') }}" />
@stop
@section('content')
<!-- 登陆界面 -->
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-push-4 page-top">
            <div class="panel panel-primary">
              <div class="panel-heading">
                <h3 class="panel-title text-center">用户登陆</h3>
              </div>
              <div class="panel-body">
                @foreach($errors->all() as $error)
                  <p class="alert alert-danger"><i class="glyphicon glyphicon-warning-sign"></i>{{$error}}</p>
                @endforeach
                @if(Session::get('regmsg'))
                  <p class="alert alert-success"><i class="fa fa-check"></i>{{Session::get('regmsg')}}</p>
                @endif
                {{ Form::open(array('url'=>URL::route("login"),'method'=>'post','class'=>'form','role'=>'form'))}}
                  <div class="form-group">
                    <label class="sr-only" for="username">用户名</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" id="username" name="username" placeholder="用户名" value="{{ Input::old('username') }}" datatype="s3-20">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password">密码</label>
                    <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-key"></i></span>
                    <input type="password" class="form-control" id="password" name="password" placeholder="密码" datatype="s6-20">
                    </div>
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember">记住密码
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">登陆</button>
                {{Form::close()}}
                  <div>
                        <p class="p1">尚未注册账号? <a href="{{ action('UserController@showRegister')}}">注册</a></p>
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