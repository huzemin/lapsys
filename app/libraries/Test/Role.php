<?php namespace Lib\Test;

class Role implements RoleInterface {

    public function checked() {
        echo 'acess' . __FILE__;
    }
}