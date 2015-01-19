<?php

class RoleTableSeeder extends Seeder {

    public function run() {
        //DB::table('users')->delete();
        $data = array(
               'role_name'=>'ROOT',
               'auth' => '',
               'status'=>1
            ); 
        DB::table('roles')->insert($data);
    }
}