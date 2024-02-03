<?php
use Illuminate\Support\Facades\Route;

// 管理側
Route::prefix('admin')->group(function () {
    Route::get('/login', function () { return view('admin.login'); })->name('admin.auth');
    Route::post('/login', 'App\Http\Controllers\Admin\AdminUserController@login')->name('admin.auth.login');
    Route::post('/logout', 'App\Http\Controllers\Admin\AdminUserController@logout')->name('admin.auth.logout');
    Route::middleware('auth:admin_users')->group(function () {
        Route::get('/articles', 'App\Http\Controllers\Admin\ArticleController@index')->name('admin.articles.index');
        Route::get('/articles/create', 'App\Http\Controllers\Admin\ArticleController@create')->name('admin.articles.create');
        Route::post('/articles', 'App\Http\Controllers\Admin\ArticleController@store')->name('admin.articles.store');
        Route::delete('/articles/{id}', 'App\Http\Controllers\Admin\ArticleController@delete')->name('admin.articles.delete');
        Route::get('/articles/edit/{id}', 'App\Http\Controllers\Admin\ArticleController@edit')->name('admin.articles.edit');
        Route::put('/articles/{id}', 'App\Http\Controllers\Admin\ArticleController@update')->name('admin.articles.update');
    });
});
