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
    public function showPreview($id) {
        $article = Article::find($id);

        $this->gdata['article'] = $article;

        return View::make('admin.article.articlespreview',$this->gdata);
    }
}