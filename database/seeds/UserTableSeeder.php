<?php 

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Curso\User;

class UserTableSeeder extends Seeder {

	public function run(){
		
		User::create(
			[
				'name' => 'Shahin Alam',
				'email' => 'sopnopriyo@gmail.com',
				'username' => 'JonnyDonny',
				'password' => \Hash::make('secret')

			]
		);
	}

}
