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

Route::prefix('administrator-' . date('d'))->group(function () {
    Route::get('', 'Admin\DashboardController@index')->middleware('can:ppdb')->name('admin.dashboard');
    Auth::routes(['register' => false]);

    /**
     * PESERTA_DIDIK ROUTE
     */
    Route::get('calon-peserta/export/zona', 'Admin\ExportController@ExportDataZona')->middleware('can:ppdb')->name('exports.zona');
    Route::get('calon-peserta/export/non-zona', 'Admin\ExportController@ExportDataNonZona')->middleware('can:ppdb')->name('exports.non-zona');
    Route::get('calon-peserta/export/all', 'Admin\ExportController@ExportAll')->middleware('can:ppdb')->name('exports.all');
    Route::get('calon-peserta/set-status/all', 'Admin\PesertaController@setApproveAll')->name('calon-peserta.updateStatusAll');
    Route::get('calon-peserta/set-status/{nomor_pendaftaran}', 'Admin\PesertaController@setStatus')->name('calon-peserta.updateStatus');
    Route::resource('calon-peserta', 'Admin\PesertaController', ['except' => ['store', 'create']]);

    /**
     * ZONA ROUTE
     */
    Route::resource('zona', 'Admin\ZonaController', ['except' => ['edit', 'show', 'update']]);
});
