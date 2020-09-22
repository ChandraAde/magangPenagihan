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

// Route::get('/', function () {
//     return view('welcome');
// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
Auth::routes();
Route::group(['middleware' => 'auth'], function () {
// Route::get('/home', 'HomeController@index')->name('home');
Route::resource('user', 'userController');
Route::resource('wajibpajak', 'wajibpajakController');
Route::resource('berkas', 'berkasController');
Route::resource('upload', 'berkasController');
Route::get('berkas/download/{id}', 'berkasController@show')->name('downloadfile');
Route::get('/cari','wajibpajakController@cari');
Route::get('/modal','wajibpajakController@modal');
});