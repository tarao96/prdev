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
include __DIR__ . '/admin.php';

// ユーザー側
Route::get('/', 'App\Http\Controllers\ArticleController@index')->name('home');
