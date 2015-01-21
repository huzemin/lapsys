@extends('layouts.admin')

@section('content')
<!-- 路径导航 -->
<ol class="breadcrumb" data-pjax="true">
  <li><a href="{{ route('admin') }}">主页</a></li>
  <li>文章管理</li>
  <li class="active">文章预览</li>
</ol>
<!-- 内容主体 -->
<div class="container-fluid">
    <div class="panel panel-default" >
        <div class="panel-heading">文章预览 <a href="{{route('admin_artilces_preview',array('id'=>$article->id))}}" class="pjaxlink" data-toggle="tptip" title="刷新"><i class="fa fa-refresh"></i></a> <span class="pull-right label label-primary">文章更新时间:{{$article->updated_at}}</span></div>
        <div class="panel-body">
            <div style="padding:20px;max-width:700px;margin:0 auto">
            <h3 class="text-center">{{$article->title}}</h3>
            <p class="text-center"><span>用户:{{$article->user?$article->user->username:''}}</span> <span>浏览次数:{{$article->viewnum}}</span></p>
            <hr />
            <div>
                {{$article->content}}
            </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered">
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
                                {{link_to_route('admin_articles_edit','编辑',array('id'=>$article->id),array('class'=>'ta')) }} {{ link_to_route('admin_articles_delete','删除',array('id'=>$article->id), array('class'=>'ta','data-pjax'=>'delete','data-toggle'=>'rptip','title'=>'警告:删除无法复原!')) }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>
</div>

@stop