@extends('layouts.main');

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3 page-top">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title text-center">警告</h3>
              </div>
              <div class="panel-body">
                <p>你不是管理员没有权限访问后台管理系统，请联系管理员！{{ link_to('/?auth=forbiden','返回首页') }}</p>
              </div>
        </div>
    </div>
</div>
@stop