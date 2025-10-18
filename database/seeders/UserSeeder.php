<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            // admin
            [
                'name' => 'Admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('111'), //111
                'role' => 'admin',
                'status' => 1,
            ],
            // teacher/employee
            [
                'name' => 'Teacher',
                'email' => 'employee@gmail.com',
                'password' => Hash::make('111'), //111
                'role' => 'employee',
                'status' => 1,
            ],
            // student
            [
                'name' => 'Student',
                'email' => 'student@gmail.com',
                'password' => Hash::make('111'), //111
                'role' => 'student',
                'status' => 1,
            ],

        ]);
    }
}
