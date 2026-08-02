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

        // 讀取當前連線的資料庫檔名
        $dbName = config('database.connections.sqlite.database');

        if (str_contains($dbName, 'database_b.sqlite')) {
            // 模擬 B 資料庫：新新增了資料 (多了 frank & grace)
            User::insert([
                ['name' => 'alex (DB-B)', 'age' => 28, 'gender' => 'male', 'created_at' => '2026-07-01 10:00:00', 'updated_at' => '2026-07-01 10:00:00'],
                ['name' => 'bob (DB-B)', 'age' => 32, 'gender' => 'male', 'created_at' => '2026-07-02 11:30:00', 'updated_at' => '2026-07-02 11:30:00'],
                ['name' => 'carol (DB-B)', 'age' => 24, 'gender' => 'female', 'created_at' => '2026-07-03 14:15:00', 'updated_at' => '2026-07-03 14:15:00'],
                ['name' => 'frank (DB-B 新增)', 'age' => 27, 'gender' => 'male', 'created_at' => '2026-07-06 08:00:00', 'updated_at' => '2026-07-06 08:00:00'],
                ['name' => 'grace (DB-B 新增)', 'age' => 31, 'gender' => 'female', 'created_at' => '2026-07-07 15:30:00', 'updated_at' => '2026-07-07 15:30:00'],
            ]);
        } else {
            // 模擬 A 資料庫：原始 3 筆基礎資料
            User::insert([
                ['name' => 'alex (DB-A)', 'age' => 28, 'gender' => 'male', 'created_at' => '2026-07-01 10:00:00', 'updated_at' => '2026-07-01 10:00:00'],
                ['name' => 'bob (DB-A)', 'age' => 32, 'gender' => 'male', 'created_at' => '2026-07-02 11:30:00', 'updated_at' => '2026-07-02 11:30:00'],
                ['name' => 'carol (DB-A)', 'age' => 24, 'gender' => 'female', 'created_at' => '2026-07-03 14:15:00', 'updated_at' => '2026-07-03 14:15:00'],
            ]);
        }
    }
}
