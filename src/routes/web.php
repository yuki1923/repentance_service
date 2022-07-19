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

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;


Auth::routes();
Route::get('home', 'PostController@index')->name('index');
Route::middleware('auth')->group(function () {
  //投稿系画面
  Route::prefix('post')->group(function () {
    Route::get('create', 'PostController@create')->name('post.create');
    Route::post('store', 'PostController@store')->name('post.store');
    Route::get('show/{id}', 'PostController@show')->name('post.show');
    Route::get('edit/{id}', 'PostController@edit')->name('post.edit');
    Route::post('update/{id}', 'PostController@update')->name('post.update');
    Route::post('delete/{id}', 'PostController@delete')->name('post.delete');
  });
  //ユーザー系画面
  Route::prefix('user')->group(function () {
    Route::get('show/{id}', 'UserController@show')->name('user.show');
    Route::get('edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('update/{id}', 'UserController@update')->name('user.update');
    Route::get('deleteConfirm', 'UserController@deleteConfirm')->name('user.delete_confirm');
    Route::post('destroy/{id}', 'UserController@destroy')->name('user.destroy');
    Route::get('post_history/{id}', 'PostController@getAllMyPosts')->name('user.post_history');
  });
});
//ゲストログインルーティング
Route::get('guest', '\App\Http\Controllers\Auth\LoginController@guestLogin')->name('guest.login');
