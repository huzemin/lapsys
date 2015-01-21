<?php
class Role extends Eloquent {

    protected $fillable = array('role_name','auth','status','level','backup','updated_user');
    protected $table = "roles";

    public function user() {
        return $this->hasOne('User','id','updated_user');
    }
}