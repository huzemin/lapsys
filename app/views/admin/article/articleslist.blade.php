@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li>文章管理</li>
  <li class="active">文章列表</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
   @if(Session::get('msg'))
        <p class="alert alert-{{Session::get('alert', 'warning')}} alert-dismissible fade in"><button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>{{Session::get('msg')}}</p>
    @endif
    <div class="panel panel-default" >
        <div class="panel-heading">文章列表 <span class="pull-right label label-primary">文章总数:{{$total}}</span></div>
        <div class="panel-body">
            <div class="list-search text-right">
            <form class="form-inline" action="{{ route('admin_articles_list') }}" role="form" method="get" data-pjax=true>
                <div class="form-group">
                    <label class="sr-only" for="s-keyword">Keyword</label>
                    <input type="text" class="form-control" name='keyword' value="{{ $keyword }}" id="s-keyword" placeholder="请输入关键词">
                </div>
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
            </form>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <caption>文章列表</caption>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>标题</th>
                            <th>用户</th>
                            <th>标签</th>
                            <th>状态</th>
                            <th>可评论</th>
                            <th>免登陆</th>
                            <th>可收藏</th>
                            <th>更新时间</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($articles as $article) 
                        <tr @if($article->status == '0') class="info" @elseif($article->status == '-1' ) class="danger" @endif>
                            <td>{{$article->id}}</td>
                            <td>{{$article->title}}</td>
                            <td>{{$article->user? $article->user->username : ''}}</td>
                            <td>{{$article->tags}}</td>
                            <td>
                                @if($article->status == 0)
                                    <span class="label label-info">未完成</span>
                                @elseif($article->status == 1)
                                    <span class="label label-success">发布</span>
                                @elseif($article->status == -1)
                                    <span class="label label-danger">禁用</span>
                                @endif
                            </td>
                            <td>
                                @if($article->s_comment) 
                                    <span class="label label-success">是</span>
                                @else
                                    <span class="label label-danger">否</span>
                                @endif
                            </td>
                            <td>
                                @if($article->s_login) 
                                    <span class="label label-success">是</span>
                                @else
                                    <span class="label label-danger">否</span>
                                @endif
                            </td>
                            <td>
                                @if($article->s_store) 
                                    <span class="label label-success">是</span>
                                @else
                                    <span class="label label-danger">否</span>
                                @endif
                            </td>
                            <td>{{$article->updated_at}}</td>
                            <td>
                                {{ link_to_route('admin_artilces_preview','预览',array('id'=>$article->id),array('class'=>'ta pjaxlink')) }} {{link_to_route('admin_articles_edit','编辑',array('id'=>$article->id),array('class'=>'ta')) }} {{ link_to_route('admin_articles_delete','删除',array('id'=>$article->id), array('class'=>'ta','data-pjax'=>'delete','data-toggle'=>'rptip','title'=>'警告:删除无法复原!')) }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if(count($articles) == 0)
                    <p class="alert alert-warning text-center">无数据</p>
                @endif
            </div>
            <div class="center">
            {{$articles->links()}}
            </div>
        </div>
    </div>
</div>

@stop