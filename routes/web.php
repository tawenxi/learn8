<?php

use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;
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
Route::get('/transferlist2', 'TransferController@list2');
Route::get('/transferlist3', 'TransferController@list3');
Route::get('/transfer', 'TransferController@home');
Route::get('/transferorders', 'TransferController@order');
Route::get('/findman/mutiman', 'HomeController@mutiman');
Route::get('/findman/{keyword}', 'HomeController@findman');
Route::get('/adjust/', 'HomeController@adjust');
Route::get('/adjustlist/', 'HomeController@adjustlist');
Route::get('/adjustorder/{keyword}', 'HomeController@adjustorder');
Route::get('/compare/{keyword}/{amount?}', 'YusuanController@compare');
Route::get('/village/{keyword?}', 'HomeController@village');
Route::get('/organization/{keyword?}', 'UnitController@organization');
Route::get('/status2', 'HomeController@status2');
Route::get('/1', function(){
	return Excel::download(new App\Exports\ListExport, 'invoices.xlsx');
});
Route::get('/status', 'HomeController@status');
Route::get('/session/{year?}', 'OtherController@session');
Route::get('/gongyang/{keyword}', 'HomeController@gongyang');
Route::get('/summarize/{keyword}', 'HomeController@summarize');
Route::get('/gongyanginfo/{keyword}', 'HomeController@gongyanginfo');
Route::get('/maninfo/{keyword?}/{excel?}', 'HomeController@maninfo');
Route::get('/import', 'ImportController@index');