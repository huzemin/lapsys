@extends('layouts.main');

@section('content')
<div id="pjax">
<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-push-3 page-top">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title text-center">警告</h3>
              </div>
              <div class="panel-body">
                <p>你当前的角色为{{$rolename}}的没有权限访问该页面！{{ link_to_route('admin','管理后台主页',array(),array('class'=>'pjaxlink')) }}</p>
              </div>
        </div>
    </div>
</div>
</div>
@stop
