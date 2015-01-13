@extends('layouts.main')
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
                {{ Form::open(array('url'=>URL::route("login"),'method'=>'post','class'=>'form','role'=>'form'))}}
                <form class="form" role="form" method="post" action="{{URL::route('login')}}">
                  <div class="form-group">
                    <label class="sr-only" for="username">用户名</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="用户名" value="{{ Input::old('username') }}">
                  </div>
                  <div class="form-group">
                    <label class="sr-only" for="password">密码</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="密码">
                  </div>
                  <div class="checkbox">
                    <label>
                      <input type="checkbox" name="remember">记住密码
                    </label>
                  </div>
                  <button type="submit" class="btn btn-primary btn-block">登陆</button>
                {{Form::close()}}
                  <div>
                        <p class="p1">尚未注册账号? <a href="#">注册</a></p>
                  </div>
              </div>
            </div>
        </div>
    </div>
</div>
@stop