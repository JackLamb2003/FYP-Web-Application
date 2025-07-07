<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert(['name' => 'Jack Lamb', 'email' => 'j.s.lamb@hudstudent.ac.uk', 'password' => Hash::make('password'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Dave Smith', 'email' => 'd.smith@hudstudent.ac.uk', 'password' => Hash::make('letmein'), 'role_id' => 2]);
        DB::table('users')->insert(['name' => 'Lucy Davidson', 'email' => 'l.davidson@hudstudent.ac.uk', 'password' => Hash::make('password2'), 'role_id' => 1]);
    }
}

