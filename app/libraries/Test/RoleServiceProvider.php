<?php

namespace Lib\Test;
use \Illuminate\Support\ServiceProvider;
use Lib\Test;
class RoleServiceProvider extends ServiceProvider {
    public function register() {
        $this->app->bindShared('role',function(){
            return new Role();
        });
    }
}