<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;

// a 頁面：登入按鈕
Route::get('/', function () {
    return view('page_a');
});

// b 頁面：顯示列表
Route::get('/page_b', function () {
    $users = User::all();
    // 讀取環境變數 VIEW_VERSION，預設為 b1
    $version = env('VIEW_VERSION', 'b1');

    return view('page_b', compact('users', 'version'));
});
