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

Route::prefix('auth')
    ->name("auth.rest.")
    ->middleware(['cors.http', 'json.response'])
    ->group(function () {

    // public routes
    Route::post('/login', 'Rest\AuthController@login')->name('login');
    Route::post('/register','Rest\AuthController@register')->name('register');

    Route::middleware("auth:api")
        ->group(function (){
            Route::post('/logout', 'Rest\AuthController@logout')->name('logout');
    });

});

