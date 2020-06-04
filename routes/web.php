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

Route::get('/', 'PublicController@index')->name('home');
Route::get('/register', 'PublicController@create')->name('register');
Route::POST('/register', 'PublicController@store')->name('register.store');
Auth::routes(['register' => false]);
