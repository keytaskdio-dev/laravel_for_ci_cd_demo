<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\User;

// a 頁面：登入按鈕入口
Route::get('/', function () {
    return view('page_a');
});

// b 頁面：顯示列表
Route::get('/page_b', function () {
    $users = User::all();
    $version = env('VIEW_VERSION', 'b1');

    return view('page_b', compact('users', 'version'));
});

// c 頁面：顯示新增與可直接編輯/刪除的列表
Route::get('/page_c', function () {
    $users = User::orderBy('id', 'desc')->get();
    return view('page_c', compact('users'));
});

// c 頁面：1. 處理資料新增 (CREATE)
Route::post('/page_c', function (Request $request) {
    User::create([
        'name'   => $request->input('name'),
        'age'    => $request->input('age'),
        'gender' => $request->input('gender'),
    ]);
    return redirect('/page_c');
});

// c 頁面：2. 處理資料更新 (UPDATE)
Route::put('/page_c/update/{id}', function (Request $request, $id) {
    $user = User::findOrFail($id);
    $user->update([
        'name'   => $request->input('name'),
        'age'    => $request->input('age'),
        'gender' => $request->input('gender'),
    ]);
    return redirect('/page_c');
});

// c 頁面：3. 處理資料刪除 (DELETE)
Route::delete('/page_c/delete/{id}', function ($id) {
    $user = User::findOrFail($id);
    $user->delete();
    return redirect('/page_c');
});
