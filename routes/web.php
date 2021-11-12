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


Route::get('/', 'HomeController@home');


Route::get('/home/{keyword}', 'FileController@index');
Route::get('/retires/{keyword}', 'RetiresController@index')->name('retires_index');

Route::get('/retiresexport', 'RetiresController@export');
Route::get('/unit/{keyword}', 'UnitController@index');
Route::get('/workman/{keyword}/{key?}', 'WorkmanController@index');
Route::get('/workman', 'WorkmanController@home');


Route::get('/transfer/行政/{type}', 'TransferController@xingzheng');
Route::get('/transfer/事业/{type}', 'TransferController@shiye');

Route::get('/transfer/县直', 'TransferController@xianzhi');

Route::get('/transfer/{keyword}', 'TransferController@index');
Route::get('/transferlist', 'TransferController@list');
Route::get('/transfer', 'TransferController@home');
Route::get('/transferorders', 'TransferController@order');

Route::get('/findman/mutiman', 'HomeController@mutiman');
Route::get('/findman/{keyword}', 'HomeController@findman');

Route::get('/adjust/', 'HomeController@adjust');
Route::get('/adjustlist/', 'HomeController@adjustlist');
Route::get('/adjustorder/{keyword}', 'HomeController@adjustorder');


Route::get('/compare/{keyword}/{amount?}', 'YusuanController@compare');




