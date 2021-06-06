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

Route::get('/home', 'HomeController@index')->name('home');

// Kriteria
Route::get('/kriteria', 'KriteriaController@index')->name('kriteria');


// Sub Kriteria
Route::get('/sub-kriteria', 'SubKriteriaController@index')->name('subKriteria');


// Karyawan
Route::get('/karyawan', 'KaryawanController@index')->name('karyawan');


// Alternatif
Route::get('/alternatif', 'AlternatifController@index')->name('alternatif');


// Tambah Data
Route::get('/tambah-data', 'TambahDataController@index')->name('tambah_data');

Route::post('/store-data', 'TambahDataController@store')->name('store_data');

Route::get('/lihat-data', 'TambahDataController@show')->name('lihat_data');

Route::get('/edit-data/{id}', 'TambahDataController@edit')->name('edit_data');

Route::post('/update-data/{id}', 'TambahDataController@update')->name('update_data');

Route::post('/hapus-data/{id}', 'TambahDataController@destroy')->name('hapus_data');

// Perhitungan
Route::get('/perhitungan', 'HitungController@show')->name('perhitungan');