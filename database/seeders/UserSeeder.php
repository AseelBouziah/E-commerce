<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('user_logins')->insert([
            'name' => 'Aseel Eyad',
           'email' => 'aseeleyad20@outlook.sa',
           'password' => Hash::make('11716621'),
       ]);
    }
}
