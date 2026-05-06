<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \Illuminate\Support\Facades\DB::table('coupons')->insert([
            ['code' => 'GIAMGIA10', 'value' => 10, 'type' => 'percentage'],
            ['code' => 'FREESHIP', 'value' => 30000, 'type' => 'fixed'],
        ]);
    }
}
