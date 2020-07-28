<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/users/{user}/edit','UserController@edit')->middleware('can:update,user');
Route::patch('/users/{users}','UserController@update')->middleware('can:update,user');
Route::delete('/users/{user}','UserController@destroy')->middleware('can:delete,user');


