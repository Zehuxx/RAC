<?php
//use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\Admin;
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


Auth::routes();
Route::get('/','HomeController@index')->name('root');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>['check.admin.role']], function(){

    //RUTAS ADMINS

Route::view('/admin', 'admin/home')->name('admin home');
Route::view('empleados', 'admin/employes')->name('admin employes');

Route::view('/', 'admin/home')->name('admin home');

Route::get('/empleados', 'Admin\EmployeesController@index')->name('admin employes');

Route::post('/empleados/Crear', 'Admin\EmployeesController@create')->name('admin employee add');

Route::view('empleados/add', 'admin/add_employe')->name('admin employes add');

Route::get('admin/modelos', 'Admin\ModelController@index')->name('admin models');
Route::get('admin/modelos/add', 'Admin\ModelController@create')->name('admin models add');
Route::get('admin/modelos/edit/{id}', 'Admin\ModelController@edit')->name('admin models edit');
Route::post('admin/modelos/store', 'Admin\ModelController@store')->name('admin models store');
Route::delete('admin/modelos/delete/{id}', 'Admin\ModelController@destroy')->name('admin models delete');
Route::put('admin/modelos/update/{id}', 'Admin\ModelController@update')->name('admin models update');

Route::get('admin/tipos', 'Admin\CarTypeController@index')->name('admin types');
Route::get('admin/tipos/add', 'Admin\CarTypeController@create')->name('admin types add');
Route::get('admin/tipos/edit/{id}', 'Admin\CarTypeController@edit')->name('admin types edit');
Route::post('admin/tipos/store', 'Admin\CarTypeController@store')->name('admin types store');
Route::put('admin/tipos/update/{id}', 'Admin\CarTypeController@update')->name('admin types update');
Route::delete('admin/tipos/delete/{id}', 'Admin\CarTypeController@destroy')->name('admin types delete');


});


Route::group(['middleware'=>['check.user.role']], function(){
//RUTAS USERS
Route::get('/carros', 'User\CarController@index')->name('user home');
Route::get('/carros/agregar', 'User\CarController@create')->name('car create');
Route::get('/carros/editar/{id}','User\CarController@edit')->name('car edit');
Route::post('/carros/guardar', 'User\CarController@store')->name('car store');
Route::put('/carros/actualizar/{id}', 'User\CarController@update')->name('car update');
Route::delete('/carros/borrar/{id}', 'User\CarController@destroy')->name('car destroy');

Route::get('/ordenes', 'User\OrderController@index')->name('order index');
Route::view('/orden', 'user/new_order')->name('order create');
Route::view('/orden/detalles', 'user/order_details')->name('order details');
Route::view('/detalles', 'user/details')->name('user detalles');



Route::view('/clientes', 'user/client_view');
Route::view('/cliente', 'user/new_client');
});

