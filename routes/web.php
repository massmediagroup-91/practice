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
Route::middleware(['auth'])->group(function() {
    Route::get('/home', 'FileController@index')->name('home');
    Route::get('/create', 'FileController@create')->name('file.create');
    Route::post('/store', 'FileController@store')->name('file.store');
    Route::get('/file/{id}',['as' => 'file.details', 'uses' => 'FileController@getFileDetails','middleware' => ['view.file', 'count.view']]);
    Route::get('/delete/{id}', 'FileController@destroy')->name('file.destroy');
    Route::get('/generate-link/{id}', 'LinkController@generateStaticLink')->name('file.static.generate');
    Route::get('/disposable-link/{id}', 'LinkController@generateDisposableLink')->name('file.disposable.generate');
    Route::get('/report', 'ReportController@index')->name('file.report');
});

Route::get('/record/{token}', 'LinkController@checkStaticLink')->name('check.static.link');
Route::get('/record/disposable/{token}', 'LinkController@checkDisposableLink')->name('check.disposable.link');
