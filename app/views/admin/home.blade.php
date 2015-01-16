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
           <button class="demo btn btn-primary btn-large" data-toggle="modal" href="#responsive">View Demo</button>
        </div>
    </div>
</div>

<div id="responsive" class="modal fade" tabindex="-1" data-width="760">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4>Responsive</h4>
  </div>
  <div class="modal-body">
      Hello
  </div>
  <div class="modal-footer">
    <button type="button" data-dismiss="modal" class="btn btn-default">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
</div>
@stop
@section('styleload')
  <link rel="stylesheet" href="{{ asset('css/bootstrap-modal.css') }}" />
@stop
@section('jsload') 
  <script type="text/javascript" src="{{ asset('js/bootstrap-modalmanager.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/bootstrap-modal.js') }}"></script>
  <script type="text/javascript">
    $(function(){
      var $modal = $('#ajax-modal');

/*$('.ajax .demo').on('click', function(){
  // create the backdrop and wait for next modal to be triggered
  $('body').modalmanager('loading');

  setTimeout(function(){
     $modal.load('modal_ajax_test.html', '', function(){
      $modal.modal();
    });
  }, 1000);
});*/
    });
  </script>
@stop