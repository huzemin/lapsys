<?php
class Acticle extends Eloquent {

    protected $fillable = array('*');
    protected $table = "articles";

    public function user() {
        return $this->hasOne('User','id','user_id');
    }
}