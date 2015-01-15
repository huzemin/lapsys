@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb">
  <li><a href="#">Home</a></li>
  <li><a href="#">Library</a></li>
  <li class="active">Data</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
    <div class="panel panel-default" >
        <div class="panel-heading">Panel heading without title</div>
        <div class="panel-body">
          <span data-toggle="rptip" title="rcptipPanel content">rcptipPanel content</span>
          <span data-toggle="tptip" title="rcptipPanel content">rcptipPanel content</span>
          <span data-toggle="bptip" title="rcptipPanel content">rcptipPanel content</span>
        </div>
    </div>
</div>
@stop