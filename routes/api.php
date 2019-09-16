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

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'userController@login');
    Route::post('signup', 'userController@signup');
    Route::group(['middleware' => 'auth:api'], function() {
        Route::get('logout', 'userController@logout');
        Route::get('user', 'userController@user');
});
});