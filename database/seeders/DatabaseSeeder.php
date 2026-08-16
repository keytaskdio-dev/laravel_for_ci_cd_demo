<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 先清空資料庫
        User::truncate();

        // 寫入 6 筆測試資料
        User::insert([
            ['name' => 'alex', 'age' => 28, 'gender' => 'male', 'created_at' => '2026-07-01 10:00:00', 'updated_at' => '2026-07-01 10:00:00'],
            ['name' => 'bob', 'age' => 32, 'gender' => 'male', 'created_at' => '2026-07-02 11:30:00', 'updated_at' => '2026-07-02 11:30:00'],
            ['name' => 'carol', 'age' => 24, 'gender' => 'female', 'created_at' => '2026-07-03 14:15:00', 'updated_at' => '2026-07-03 14:15:00'],
            ['name' => 'david', 'age' => 29, 'gender' => 'male', 'created_at' => '2026-08-16 10:00:00', 'updated_at' => '2026-08-16 10:00:00'],
            ['name' => 'emma', 'age' => 26, 'gender' => 'female', 'created_at' => '2026-08-16 10:05:00', 'updated_at' => '2026-08-16 10:05:00'],
            ['name' => 'frank', 'age' => 31, 'gender' => 'male', 'created_at' => '2026-08-16 10:10:00', 'updated_at' => '2026-08-16 10:10:00'],
        ]);
    }
}
