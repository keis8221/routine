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



Auth::routes();
# ユーザー投稿関係(index, show)

Route::get('/routine', 'RoutineController@index')->name('routines.index');
Route::post('/routine/create', 'RoutineController@create')->name('routines.create');

// ユーザー詳細表示
Route::get('/users/{id}', 'UserController@show')->name('users.show');




Route::get('/home', 'HomeController@index')->name('home');
// Route::GROUP(['middleware' => ['auth:user']], function() {

// });
// Route::get('/admin', 'UserController@admin')->name('admin');
