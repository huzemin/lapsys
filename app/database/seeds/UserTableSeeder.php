<?php

class UserTableSeeder extends Seeder {

    public function run() {
        //DB::table('users')->delete();
        for($i = 0; $i < 20; $i++) {
            $data = array(
                    'name'=>'胡泽民'.$i,
                    'username' => 'huzemin8'.$i,
                    'email' => $i.($i*2).'@126.com',
                    'password' => Hash::make('123456'),
                    'loginip' => get_client_ip(),
                    'loginnum' => 0,
                    'loginclient' => Request::server('HTTP_USER_AGENT')
                ); 
            DB::table('users')->insert($data);
        }

    }
}