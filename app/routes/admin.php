<?php
use Illuminate\Support\Facades\Route;

// 管理側
Route::prefix('admin')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('admin.auth');
    Route::post('/login', 'App\Http\Controllers\Admin\AdminUserController@login')->name('admin.auth.login');
    Route::post('/logout', 'App\Http\Controllers\Admin\AdminUserController@logout')->name('admin.auth.logout');
    Route::get('/articles', function () { return view('admin.articles'); })->name('admin.articles');
});
