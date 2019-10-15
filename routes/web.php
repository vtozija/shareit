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

Route::get('file', 'FileController@index')->name('file')->middleware('auth');

Route::post('file', 'FileController@store')->name('file')->middleware('auth');

Route::get('file/{id}', 'FileController@details')->name('file.show');

Route::get('file/{id}/download', 'FileController@download')->name('file.download');

Route::post('file/{id}/delete', 'FileController@download')->name('file.delete')->middleware('auth');

Route::get('files-list', 'FileController@listFiles')->name('files-list')->middleware('auth');