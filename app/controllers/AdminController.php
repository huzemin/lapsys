<?php

class AdminController extends BaseController {
    public $gdata;
    public function __construct() {
        $this->gdata = parent::getGdata();
    }

    public function showHome(){
        return View::make('admin.home',$this->gdata);
    }
}