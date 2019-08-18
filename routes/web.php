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
})->name('home');

//RUTAS ADMINS
Route::view('/admin', 'admin/home')->name('admin home');
//RUTAS USERS
Route::view('/user', 'user/home')->name('user home');
Route::view('/detalles', 'user/details')->name('user detalles');
Route::view('/orden', 'user/new_order')->name('user orden');
Route::view('/carro', 'user/new_car')->name('user carro');
Route::view('/ordenes', 'user/orderview');