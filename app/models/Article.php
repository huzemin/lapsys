<?php
class Article extends Eloquent {

    protected $fillable = array('user_id','title','description','author','refer','website','tags','content','viewnum','storenum','likenum','status','s_comment','s_login','s_store');
    protected $table = "articles";

    public function user() {
        return $this->hasOne('User','id','user_id');
    }

    public function insert(Array $data) {
        $result = DB::table($tthis->table)->insert($data);
        return $result;
    }
}