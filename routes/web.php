<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

// c 頁面：顯示編輯表單與最新列表
Route::get('/page_c', function () {
    $users = User::orderBy('id', 'desc')->get();
    return view('page_c', compact('users'));
});

// c 頁面：寫入資料庫 (name, age, gender)
Route::post('/page_c', function (Request $request) {
    User::create([
        'name'   => $request->input('name'),
        'age'    => $request->input('age'),
        'gender' => $request->input('gender'),
    ]);

    return redirect('/page_c');
});
