<?php
use Illuminate\Support\Facades\Route;

// 管理側
Route::prefix('admin')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('admin.auth');
    Route::post('/login', 'App\Http\Controllers\Admin\AdminUserController@login')->name('admin.auth.login');
    Route::post('/logout', 'App\Http\Controllers\Admin\AdminUserController@logout')->name('admin.auth.logout');
    Route::get('/articles', 'App\Http\Controllers\Admin\ArticleController@index')->name('admin.articles');
    Route::delete('/articles/{id}', 'App\Http\Controllers\Admin\ArticleController@delete')->name('admin.articles.delete');
});
