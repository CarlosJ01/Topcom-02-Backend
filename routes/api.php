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

Route::group(['prefix' => 'web-services'], function () {
    Route::group(['middleware' => ['cors']], function () {
        Route::get('get-articulos', 'ArticulosController@getArticulos');
        Route::post('registro-usuarios', 'UsuarioController@registrar');
        Route::post('login', 'UsuarioController@login');
        Route::post('login', 'UsuarioController@login');

    });
});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
