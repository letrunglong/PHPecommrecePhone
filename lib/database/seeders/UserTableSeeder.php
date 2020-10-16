<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Them users
        $data=[
            [
                'name'=>'Long',
                'email'=>'letrunglong07@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>1,
            ],
            [
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'password'=>bcrypt('123456'),
                'level'=>1,
            ]
        ];
        DB::table('vp_users')->insert($data);
    }
}
