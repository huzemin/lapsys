<?php
class Role extends Eloquent {

    protected $fillable = array('*');
    protected $table = "roles";

    public function user() {
        return $this->hasOne('User','id','updated_user');
    }

    public function edit() {
        
    }
}