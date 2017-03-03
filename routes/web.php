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


// HOME //
Route::get('/home/', 'HomeController@manageVue');

// ITEMS //
Route::get('/items/', 'ItemController@manageVue');
Route::resource('vueitems','ItemController');

// USERS //
Route::get('/users/', 'UserController@manageVue');
Route::resource('vueusers','UserController');

// SALES //

Route::get('/sales/', 'SaleController@manageVue');
Route::resource('vuesales','SaleController');

