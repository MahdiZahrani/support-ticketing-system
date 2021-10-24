<?php

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

Route::prefix('v1/auth')->name("auth.rest.")->middleware(['cors.http', 'json.response'])->group(function () {
    // public routes
    Route::post('login', 'Auth\LoginController@login')->name('login');
    Route::post('register','Auth\RegisterController@register')->name('register');

    Route::middleware("auth:api")->group(function (){
        Route::post('logout', 'AuthController@logout')->name('logout');
    });

});
