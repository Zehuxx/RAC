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
Route::post('/empleados/editar', 'Admin\EmployeesController@edit');
Route::post('/empleados/borrar', 'Admin\EmployeesController@destroy');

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

Route::get('admin/marcas', 'Admin\CarBrandController@index')->name('admin brands');
Route::get('admin/marcas/add', 'Admin\CarBrandController@create')->name('admin brands add');
Route::get('admin/marcas/edit/{id}', 'Admin\CarBrandController@edit')->name('admin brands edit');
Route::post('admin/marcas/store', 'Admin\CarBrandController@store')->name('admin brands store');
Route::put('admin/marcas/update/{id}', 'Admin\CarBrandController@update')->name('admin brands update');
Route::delete('admin/marcas/delete/{id}', 'Admin\CarBrandController@destroy')->name('admin brands delete');
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
Route::get('/orden/agregar', 'User\OrderController@create')->name('order create');
Route::post('/orden/guardar', 'User\OrderController@store')->name('order store');

Route::get('/orden/{id_orden}/detalles', 'User\DetailController@index')->name('details index');
Route::get('/orden/{id_orden}/carro/{id_carro}/detalle/agregar', 'User\DetailController@create')->name('detail create');
Route::post('/orden/{id_orden}/carro/{id_carro}/detalle/guardar', 'User\DetailController@store')->name('detail store');
Route::delete('/orden/{id_orden}/detalle/{id_detalle}/borrar', 'User\DetailController@destroy')->name('detail destroy');


Route::get('user/clientes', 'User\CustomerController@index')->name('user clients');
Route::get('user/clientes/add', 'User\CustomerController@create')->name('user clients add');
Route::get('user/clientes/edit/{id}', 'User\CustomerController@edit')->name('user clients edit');
Route::post('user/clientes/store', 'User\CustomerController@store')->name('user clients store');
Route::put('user/clientes/update/{id}', 'User\CustomerController@update')->name('user clients update');
Route::delete('user/clientes/delete/{id}', 'User\CustomerController@destroy')->name('user clients delete');

});

