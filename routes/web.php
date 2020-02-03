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
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/create', 'HomeController@create')->name('file.create');
    Route::post('/store', 'HomeController@store')->name('file.store');
    Route::get('/file/{id}',['as' => 'file.details', 'uses' => 'HomeController@getFileDetails','middleware' => ['view.file', 'count.view']]);
    Route::get('/delete/{id}', 'HomeController@destroy')->name('file.destroy');
    Route::get('/generate-link/{id}', 'HomeController@generateLink')->name('file.generate');
    Route::get('/disposable-link/{id}', 'HomeController@generateDisposableLink')->name('file.disposable.generate');
});

Route::get('/record/{token}', 'HomeController@checkLink')->name('check.link');
Route::get('/record/disposable/{token}', 'HomeController@checkDisposableLink')->name('check.disposable.link');
