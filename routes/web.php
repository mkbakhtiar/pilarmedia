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

Route::get('/dashboard', 'DashboardController@index');
