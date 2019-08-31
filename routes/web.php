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
Route::view('/admin/empleados', 'admin/employes')->name('admin employes');
Route::view('/admin/empleados/add', 'admin/add_employe')->name('admin employes add');

Route::view('/admin/modelos', 'admin/models')->name('admin models');
Route::view('/admin/modelos/add', 'admin/add_model')->name('admin models add');

Route::view('/admin/tipos', 'admin/types')->name('admin types');
Route::view('/admin/tipos/add', 'admin/add_type')->name('admin types add');
//RUTAS USERS
Route::view('/user', 'user/home')->name('user home');
Route::view('/detalles', 'user/details')->name('user detalles');
Route::view('/orden', 'user/new_order')->name('user orden');
Route::view('/carro', 'user/new_car')->name('user carro');
Route::view('/ordenes', 'user/order_view');
Route::view('/clientes', 'user/client_view');
Route::view('/cliente', 'user/new_client');
