<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
            'role_id'=>'1',
            'name'=>'MR.Admin',
            'username'=>'admin',
            'email'=>'linh@gmail.com',
            'password'=>bcrypt('linh123@'),
        ]);
//
//        DB::table('users')->insert([
//            'role_id'=>'2',
//            'name'=>'MR.Author',
//            'username'=>'author',
//            'email'=>'hoa@gmail.com',
//            'password'=>bcrypt('hoa123@'),
//        ]);

//        DB::table('users')->insert([
//            'role_id'=>'2',
//            'name'=>'MR.Author',
//            'username'=>'mai',
//            'email'=>'mai@gmail.com',
//            'password'=>bcrypt('mai123@'),
//        ]);
    }
}
