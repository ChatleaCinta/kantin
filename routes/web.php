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

Route::get('/login', function () {
    return view('login');
});

Route::get('/about-me', 'KantinController@about');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/proseslogin', 'UserController@proseslogin');
Route::post('/register', 'UserController@prosesregister');

//kantin
Route::get('/index', 'KantinController@kantin');
Route::get('/kantin-create', 'KantinController@create');
Route::post('/kantin-simpan_tambah', 'KantinController@simpan_tambah');
Route::get('kantin-{id}-edit', 'KantinController@edit');
Route::post('kantin-{id}-update', 'KantinController@update');
Route::get('kantin-{id}-delete', 'KantinController@delete');

//menu
Route::get('kantin-{id}-menu', 'MenuController@menu');
Route::get('/menu-tambah', 'MenuController@tambah');
Route::post('/menu-simpan_tambah', 'MenuController@simpan_tambah');
Route::get('{id}-menu', 'MenuController@tampil');
Route::get('menu-{id}-change', 'MenuController@change');
Route::post('menu-{id}-update', 'MenuController@update');
Route::get('menu-{id}-delete', 'MenuController@delete');

Route::get('pesan-{id}', 'PesanController@index');
Route::post('pesan-{id}', 'PesanController@pesan');
Route::get('check-out', 'PesanController@check_out');
Route::delete('check-out-{id}', 'PesanController@delete');

Route::get('konfirmasi-check-out', 'PesanController@konfirmasi');
