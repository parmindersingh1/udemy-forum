<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      App\User::create([
        'name' => 'admin',
        'password' => bcrypt('admin'),
        'email' => 'admin@udemy-forum.dev',
        'admin' => 1,
        'avatar' => asset('avatars/avatar.png')


        ]);

      App\User::create([
        'name' => 'Luc Audemard',
        'password' => bcrypt('secret'),
        'email' => 'bjluc@bjluc.co.uk',
        'avatar' => asset('avatars/1.jpg')


        ]);
    }
}