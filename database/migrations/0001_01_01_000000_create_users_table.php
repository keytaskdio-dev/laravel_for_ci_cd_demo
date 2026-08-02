<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * 建表邏輯
     */
    public function up(): void
    {
        // 只保留我們測試真正需要的 users 表格與欄位
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age');
            $table->string('gender');
            $table->timestamps(); // 會自動建立 created_at 與 updated_at
        });
    }

    /**
     * 刪表邏輯（還原資料庫時用）
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
