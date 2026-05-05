<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Admin User',
            'full_name' => 'Quản trị viên',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'level' => 1, // 1 là admin
            'phone' => '0123456789',
            'address' => 'Hà Nội'
        ]);
    }
}
