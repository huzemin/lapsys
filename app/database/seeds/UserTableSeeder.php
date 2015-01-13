<?php

class UserTableSeeder extends Seeder {

    public function run() {
        DB::table('users')->delete();
        $data = array(
                'name'=>'胡泽民',
                'username' => 'huzemin8',
                'email' => 'huzemin8@126.com',
                'password' => Hash::make('123456'),
                'loginip' => get_client_ip(),
                'loginnum' => 0,
                'loginclient' => Request::server('HTTP_USER_AGENT')
            ); 

        DB::table('users')->insert($data);

    }
}