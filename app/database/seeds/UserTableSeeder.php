<?php

class UserTableSeeder extends Seeder{
	public function run(){
		User::create([
			'email' => 'zhangke3012@gmail.com',
			'password'=>Hash::make('420327'),
			'nickname'=>'admin',
			'is_admin'=>1,
			]);
	}

}
