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
//     return view('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/roles', 'RolesController@index');
// Route::get('/roles/create', 'RolesController@create');
// Route::post('/roles/store', 'RolesController@store');
// Route::get('permissions', [
// 	'middleware'=>'permission:permission-view',
// 	'uses' => 'PermissionsController@index'
// ]);
Route::group(['middleware' => 'auth'], function() {
	Route::resource('permissions', 'PermissionsController');
	Route::resource('roles', 'RolesController');
	Route::resource('users', 'UsersController');
});

//Route::get('/permissions', 'PermissionsController@index');
