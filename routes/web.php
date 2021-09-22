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

Route::get('/', 'LoginController@index')->middleware('cekstatus');
Route::get('/daftar', 'RegisterController@index')->middleware('cekstatus');
Route::post('/log/rg', 'RegisterController@store')->middleware('cekstatus');
Route::post('/log/lg', 'LoginController@login')->middleware('cekstatus');
Route::get('/log/out', 'LoginController@logout');

Route::get('/dashboard', 'DashboardController@index')->middleware('cekstatusOn');
Route::get('/d-manajer', 'DashboardController@manajer')->middleware('cekstatusOn');
Route::get('/acc/{id}', 'DashboardController@acc')->middleware('cekstatusOn');
Route::get('/tolak/{id}', 'DashboardController@tolak')->middleware('cekstatusOn');
Route::get('/profil', 'DashboardController@profil')->middleware('cekstatusOn');
Route::get('/ab/nw', 'AbsenController@absenMasuk')->middleware('cekstatusOn');
Route::get('/ab/pl', 'AbsenController@absenPulang')->middleware('cekstatusOn');
Route::post('/up/pr', 'DashboardController@updateProfil')->middleware('cekstatusOn');

Route::get('/f/ijin', 'IjinController@index')->middleware('cekstatusOn');
Route::get('/f/ijin/list', 'IjinController@show')->middleware('cekstatusOn');
Route::post('/st/ij', 'IjinController@store')->middleware('cekstatusOn');
