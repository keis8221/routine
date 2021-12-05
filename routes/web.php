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
// Route::GET('admin/login', 'Auth\LoginController@showLoginForm')->name('login');
// Route::POST('admin/login', 'Auth\LoginController@login')->name('login');
// // This prevents user from accessing logout via url
// Route::GET('logout', 'Auth\LoginController@logout')->name('logout');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/admin', 'UserController@admin')->name('admin');
