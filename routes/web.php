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

Route::get('/home', 'DashboardController@index')->name('home');

Route::get('/home','DashboardController@dashboard')->name('dashboard');

Route::get('/create','FileController@create')->name('create');

Route::post('/savefile','FileController@createOrUpdateFileMaster')->name('createnew');

Route::get('/filestatuslist', 'FileController@showFileStatus')->name('latestfilelist');

Route::match(['get', 'post'], '/fileslist', 'FileController@showFileStatus')->name('filelist');

Route::get('/filestatuses', 'FileController@retrieveFileStatusMaster')->name('file_statuses');

Route::match(['get','post'], '/filedata/edit/{id}','FileController@viewFileMasterById')->name('file_update');

Route::get('/filedata/delete', 'FileController@deleteFile')->name('deletefile');


