<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// ユーザー側
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('home');

// 管理側
Route::get('/admin/login', function () {
    return view('admin.login');
})->name('admin.login');
Route::get('/admin/articles', function () {
    return view('admin.articles');
})->name('admin.articles');
