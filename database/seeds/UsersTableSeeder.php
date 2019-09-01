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
        DB::table('users')->insert([
            'id'=>1,
            'role_id' => 1,
            'email' => 'admin@email.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
        DB::table('users')->insert([
            'id'=>2,
            'role_id' => 2,
            'email' => 'user@email.com',
            'password' => bcrypt('secret'), // secret
            'remember_token' => str_random(10),
        ]);
    }
}