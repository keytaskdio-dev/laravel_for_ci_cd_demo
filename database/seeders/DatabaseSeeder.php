<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // 寫入 5 筆假資料，類比正式環境不同時間產生的資料
        User::insert([
            ['name' => 'alex', 'age' => 28, 'gender' => 'male', 'created_at' => '2026-07-01 10:00:00', 'updated_at' => '2026-07-01 10:00:00'],
            ['name' => 'bob', 'age' => 32, 'gender' => 'male', 'created_at' => '2026-07-02 11:30:00', 'updated_at' => '2026-07-02 11:30:00'],
            ['name' => 'carol', 'age' => 24, 'gender' => 'female', 'created_at' => '2026-07-03 14:15:00', 'updated_at' => '2026-07-03 14:15:00'],
            ['name' => 'david', 'age' => 40, 'gender' => 'male', 'created_at' => '2026-07-04 09:45:00', 'updated_at' => '2026-07-04 09:45:00'],
            ['name' => 'emma', 'age' => 29, 'gender' => 'female', 'created_at' => '2026-07-05 16:20:00', 'updated_at' => '2026-07-05 16:20:00'],
        ]);
    }
}
