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

Route::get('/tree', function () {
	return view('tree');
});

Auth::routes();
Route::get('/grid', 'PagesController@grid')->name('grid');

Route::prefix('ajax')->group(function () {
	Route::get('/tree-default', 'TreeController@default');
	Route::get('/users', 'GridController@index');
});
