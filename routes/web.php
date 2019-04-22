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
Route::get('/masuk/{karyawan}/{arduino}', 'LogController@masuk');
Route::get('/keluar/{karyawan}/{arduino}', 'LogController@keluar');

// roles -> /roles
// users -> /users
// media -> /media
// posts -> /posts
// pages -> /pages
//categories -> /categories
// settings -> /settings


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
