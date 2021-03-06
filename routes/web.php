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

Route::get('/', 'CameraController@index');
Route::post('/', 'CameraController@store');

Route::get('/video', 'CameraController@index_video');
Route::post('/video', 'CameraController@store');
