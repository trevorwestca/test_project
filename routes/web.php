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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
Route::get('/', 'HomeController@index')->name('home')->middleware('guest');
Route::get('/profile', 'HomeController@profile')->name('profile')->middleware('auth');
Route::post('/profile/save', 'HomeController@saveProfile');
