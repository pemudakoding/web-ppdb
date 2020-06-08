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
Route::post('/register', 'PublicController@store')->name('register.store');
Route::get('/cetak/{no_pendaftaran}', 'PublicController@cetakPsb')->name('register.cetak');
Route::get('/register-info', 'PublicController@checkRegister')->name('register.info');
Route::POST('/register-info', 'PublicController@getRegisterData')->name('register.getData');

route::get('logouts', function () {
    Auth::logout();
});
Route::prefix('administrator-' . date('d'))->group(function () {
    Route::get('', 'Admin\DashboardController@index')->middleware('can:ppdb')->name('admin.dashboard');
    Auth::routes(['register' => false]);
});
