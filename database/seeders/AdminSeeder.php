<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('logins')->insert([
            'email' => 'aseeleyad20@outlook.sa',
            'password' => Hash::make('11716621'),
        ]);
    }
}
