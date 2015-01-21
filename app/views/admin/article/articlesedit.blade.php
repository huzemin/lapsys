@extends('layouts.admin')

@section('content')

<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li><a href="{{ route('admin_articles_list') }}">文章管理</a></li>
  <li class="active">编辑文章</li>
</ol>
<!-- 内容主体 -->

<div class="container-fluid">
    <div class ="panel panel-primary" >
        <div class="panel-heading">编辑文章</div>
        <div class="panel-body">
            {{ Form::open(array('class'=>"form-horizontal","role"=>'form','enctype'=>"multipart/form-data"))}}
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">文章标题</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" id="title" name="title" value="{{$article->title}}" placeholder="文章标题" datatype="*">
                </div>
              </div>
              <div class="form-group">
                <label for="tags" class="col-sm-2 control-label">设置标签</label>
                <div class="col-sm-10 col-md-4">
                  <input type="text" class="form-control" id="tags" name="tags" value="{{$article->tags}}" placeholder="标签">
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">文章描述</label>
                <div class="col-sm-10 col-md-4">
                  <textarea  class="form-control" id="description" name="description" rows=5>{{$article->description}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">文章内容</label>
                <div class="col-sm-10 col-md-9">
                  <textarea id="container" name="content" type="text/plain">{{$article->content}}</textarea>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">文章状态</label>
                <div class="col-sm-10 col-md-4">
                    <select name="status" class="selectpicker">
                        <option value="1" @if($article->status == 1) selected @endif>发布</option>
                        <option value="0" @if($article->status == 0) selected @endif>未完成</option>
                        <option value="-1" @if($article->status == -1) selected @endif>禁用</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">评论设置<i class="fa fa-question-circle" data-toggle="tptip" title="文章评论功能是否打开" ></i></label>
                <div class="col-sm-10 col-md-4">
                    <select name="s_comment" class="selectpicker">
                        <option value="1" @if($article->s_comment == 1) selected @endif>打开评论</option>
                        <option value="0" @if($article->s_comment == 0) selected @endif>关闭评论</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">收藏设置<i class="fa fa-question-circle" data-toggle="tptip" title="文章是否被其他用户收藏" ></i></label>
                <div class="col-sm-10 col-md-4">
                    <select name="s_store" class="selectpicker">
                        <option value="1" @if($article->s_store == 1) selected @endif>可收藏</option>
                        <option value="0" @if($article->s_store == 0) selected @endif>不可收藏</option>
                    </select>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label">阅读需登陆<i class="fa fa-question-circle" data-toggle="tptip" title="是否需要登录才可阅读文章" ></i></label>
                <div class="col-sm-10 col-md-4">
                    <select name="s_login" class="selectpicker">
                        <option value="1" @if($article->s_login == 1) selected @endif>不需要</option>
                        <option value="0" @if($article->s_login == 0) selected @endif>需要</option>
                    </select>
                </div>
              </div>
              <fieldset class="well">
                <div class="form-group">
                  <label for="website" class="col-sm-2 control-label">来源网站</label>
                  <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" id="website" name="website" value="{{$article->website}}" placeholder="来源网站">
                  </div>
                </div>
                <div class="form-group">
                  <label for="refer" class="col-sm-2 control-label">引用链接</label>
                  <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" id="refer" name="refer" value="{{$article->refer}}" placeholder="引用链接">
                  </div>
                </div>
                <div class="form-group">
                  <label for="author" class="col-sm-2 control-label">原作者</label>
                  <div class="col-sm-10 col-md-4">
                    <input type="text" class="form-control" id="author" name="author" value="{{$article->author}}" placeholder="原作者">
                  </div>
                </div>
              </fieldset>
              <input type="hidden" name="id" value="{{$article->id}}" />
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

@section('jsload') 
<script type="text/javascript" src="{{ asset('js/ueditor/ueditor.config.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/ueditor/ueditor.all.min.js') }}"></script>
<script type="text/javascript">
  $(function(){
    if(typeof UE != 'undefined') {
      var ue = UE.getEditor('container');
    }
  });
</script>
@stop