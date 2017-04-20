<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends DatabaseSeeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('users')->insert([
            'name' => 'Shahin Alam',
            'email' => 'sopnopriyo@gmail.com',
            'password' => bcrypt('admin'),
        ]);
    }
}
