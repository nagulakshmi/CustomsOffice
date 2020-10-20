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

Route::get('/home','HomeController@dashboard')->name('dashboard');

Route::get('/create','FileController@create')->name('create');

Route::post('/savefile','FileController@fileCreate')->name('createnew');

Route::get('/filestatuslist', 'FileController@showFileStatus')->name('latestfilelist');

Route::match(['get', 'post'], '/fileslist', 'FileController@showFileStatus')->name('filelist');

Route::get('/filestatuses', 'FileController@retrieveFileStatusMaster')->name('file_statuses');

Route::match(['get','post'], '/filedata/edit/{id}','FileController@filedataupdate')->name('file_update');

Route::get('/filedata/delete', 'FileController@deleteFile')->name('deletefile');


