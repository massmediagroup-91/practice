<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['namespace' => 'Api'], function () {
    Route::group(['namespace' => 'Auth'], function () {
        Route::post('register', 'RegisterController');
        Route::post('login', 'LoginController');
        Route::post('logout', 'LogoutController')->middleware('auth:api');
    });
    Route::post('upload', 'FileController@upload');
    Route::get('download/{fileId}', 'FileController@download')->middleware('auth:api');
    Route::get('destroy/{id}', 'FileController@destroy')->middleware('auth:api');
    Route::get('generate-link/{id}', 'GenerateController@generateStaticLink')->middleware('auth:api');
    Route::get('disposable-link/{id}', 'GenerateController@generateDisposableLink')->middleware('auth:api');
    Route::get('record/{token}', 'FindLinkController@findStaticLink')->name('api.check.static.link');
    Route::get('record/disposable/{token}', 'FindLinkController@DisposableLink')->name('api.check.disposable.link');
});
