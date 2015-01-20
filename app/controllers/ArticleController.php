<?php

class ArticleController extends BaseController {
    public $gdata;

    public function __construct() {
        $this->gdata = parent::getGdata();
    }

    public function showAdd() {
        return View::make('admin.article.articlesadd',$this->gdata);
    }
}