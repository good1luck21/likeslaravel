<?php

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

Route::get('/', function () {
    return view('welcome');
});

// 投稿画面の表示
Route::get('/', 'PostsController@index');
// 投稿処理
Route::post('posts', 'PostsController@store');

// いいねボタン
// Route::get('/reply/nice/{post}', 'NiceController@nice')->name('nice');
// Route::get('/reply/unnice/{post}', 'NiceController@unnice')->name('unnice');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');