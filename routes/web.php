<?php

use Illuminate\Http\Request;

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
Route::get('/routine/create', 'RoutineController@create')->name('routines.create');
Route::post('/routine/store', 'RoutineController@store')->name('routines.store');
Route::get('/routine/store', 'RoutineController@store')->name('routines.store');
Route::post('/multiple_inputs', 'RoutineController@multiple_inputs');
Route::get('/multiple_inputs', 'RoutineController@multiple_inputs');
Route::post('/search', 'ItemSearchController@search');
Route::get('/routine/{routine}', 'RoutineController@show')->name('routines.show');

// Route::resource('/routine', 'RoutineController');

//routines??
Route::prefix('routines')->name('routines.')->group(function () {
    Route::put('/{routine}/like', 'RoutineController@like')->name('like');
    Route::delete('/{routine}/like', 'RoutineController@unlike')->name('unlike');
    Route::get('/{routine}/hasfavorites', 'RoutineController@hasfavorite');
});

Route::resource('/comments', 'CommentController')->only('store');

// ユーザー詳細表示
Route::get('/users/show/{id}', 'UserController@show')->name('users.show');
Route::get('/users/edit/{routine_id}', 'UserController@edit')->name('users.edit');

Route::get('/home', 'HomeController@index')->name('home');

// Route::GROUP(['middleware' => ['auth:user']], function() {

// });
// Route::get('/admin', 'UserController@admin')->name('admin');
