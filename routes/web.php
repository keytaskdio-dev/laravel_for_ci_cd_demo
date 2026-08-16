<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

// a 頁面：登入按鈕
Route::get('/', function () {
    return view('page_a');
});

// b 頁面：顯示列表
Route::get('/page_b', function () {
    $users = User::all();
    $version = env('VIEW_VERSION', 'b1');

    return view('page_b', compact('users', 'version'));
});

// c 頁面：顯示編輯與列表頁面
Route::get('/page_c', function () {
    $users = User::orderBy('id', 'desc')->get(); // 最新新增的排前面
    return view('page_c', compact('users'));
});

// c 頁面：處理資料新增
Route::post('/page_c', function (Request $request) {
    // 寫入資料庫
    User::create([
        'name' => $request->input('name'),
        'email' => $request->input('email'),
        'password' => Hash::make($request->input('password')),
    ]);

    // 儲存後重導向回 /page_c，實現刷新效果
    return redirect('/page_c');
});
