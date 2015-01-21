<?php

class ArticleController extends BaseController {
    public $gdata;

    public function __construct() {
        $this->gdata = parent::getGdata();
    }
    public function show() {
        // 关键词搜索
        $keyword = Input::get('keyword','');
        if(!empty($keyword)) {
          $Earticle = Article::where('title','like',"%$keyword%");
        } else {
          $Earticle = new Article;
        }

        $articles = $Earticle->orderBy('status','desc')->orderBy('created_at','desc')->paginate(15);

        // 分页参数添加自定义信息
        if(!empty($keyword)) {
            $articles->appends(array('keyword' => $keyword));
        }
        $this->gdata['articles'] = $articles;
        $this->gdata['total'] = $articles->getTotal();
        return View::make('admin.article.articleslist',$this->gdata)->withKeyword($keyword);
    }
    // 添加文章页面
    public function showAdd() {
        return View::make('admin.article.articlesadd',$this->gdata);
    }

    public function doAdd() {
        $data = Input::all();
        if(isset($data['_token'])) {
            unset($data['_token']);
        }
        $data['user_id'] = Auth::id();
        $article = Article::create($data);
        if(isset($article->id)) {
            return Redirect::route('admin_articles_add');
        } else {
            return Redirect::route('admin');
        }
    }
    public function showEdit($id) {
        $article = Article::find($id);

        $this->gdata['article'] = $article;

        return View::make('admin.article.articlesedit',$this->gdata);
    }

    public function doEdit($id) {
        $article = Article::find($id);
        if($article) {
            // 文章更新
            $article->title       = Input::get('title','');
            $article->description = Input::get('description','');
            $article->content     = Input::get('content','');
            $article->refer       = Input::get('refer','');
            $article->website     = Input::get('website','');
            $article->s_comment   = Input::get('s_comment','');
            $article->s_login     = Input::get('s_login','');
            $article->s_store     = Input::get('s_store','');
            $article->status      = Input::get('status','');
            $article->tags        = Input::get('tags','');

            if($article->save()) {
                $msg = "文章更新成功!";
                $alert = "success";
            }
        } 

        if(!isset($msg)) {
            $msg = "文章更新失败!";
            $alert = "danger";
        }
       
        return Redirect::route('admin_articles_list')->with('msg',$msg)->with('alert',$alert);
    }

    public function showPreview($id) {
        $article = Article::find($id);

        $this->gdata['article'] = $article;

        return View::make('admin.article.articlespreview',$this->gdata);
    }

    // 文章删除
    public function delete($id) {
        $article =  Article::find($id);
        if($article){
            if($article->delete()) {
                $alert = "success";
                $msg = "文章删除成功！";
            }
        }
        if(!isset($msg)) {
            $alert = "danger";
            $msg = "文章删除失败！";
        }

        return Redirect::route('admin_articles_list')->with('msg',$msg)->with('alert',$alert);
    }
}