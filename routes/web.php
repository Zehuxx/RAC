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

Route::view('admin/empleados', 'admin/employes')->name('admin employes');
Route::get('admin/empleados', 'Admin\EmployeesController@index')->name('admin employees');
Route::get('admin/empleados/agregar', 'Admin\EmployeesController@create')->name('admin employees create');
Route::post('admin/empleados/guardar', 'Admin\EmployeesController@store')->name('admin employees store');
Route::get('admin/empleados/editar/{id}', 'Admin\EmployeesController@edit')->name('admin employees edit');
Route::put('admin/empleados/actualizar/{id}', 'Admin\EmployeesController@update')->name('admin employees update');
Route::delete('admin/empleados/borrar/{id}', 'Admin\EmployeesController@destroy')->name('admin employees delete');

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

Route::get('admin/groups', 'Admin\GroupController@index')->name('admin groups');
Route::get('admin/groups/show/{id}', 'Admin\GroupController@show')->name('admin groups show');
Route::get('admin/groups/add', 'Admin\GroupController@create')->name('admin groups add');
Route::post('admin/groups/store', 'Admin\GroupController@store')->name('admin groups store');
Route::post('admin/groups/add/employee/{id}', 'Admin\GroupController@addEmployee')->name('admin groups add employee');

Route::get('admin/reportes', 'Admin\ReportController@index')->name('admin reports');
Route::post('admin/reportes', 'Admin\ReportController@generate')->name('admin reports generate');


Route::post('admin/reportes/pdf','Admin\ReportController@pdf')->name('admin pdf');
});


Route::group(['middleware'=>['check.user.role']], function(){
//RUTAS USERS
Route::get('user/carros', 'User\CarController@index')->name('user home');
Route::get('user/carros/agregar', 'User\CarController@create')->name('car create');
Route::get('user/carros/editar/{id}','User\CarController@edit')->name('car edit');
Route::post('user/carros/guardar', 'User\CarController@store')->name('car store');
Route::put('user/carros/actualizar/{id}', 'User\CarController@update')->name('car update');
Route::delete('user/carros/borrar/{id}', 'User\CarController@destroy')->name('car destroy');

Route::get('user/ordenes', 'User\OrderController@index')->name('order index');
Route::get('user/orden/agregar', 'User\OrderController@create')->name('order create');
Route::post('user/orden/guardar', 'User\OrderController@store')->name('order store');
Route::delete('user/orden/{id_orden}/borrar', 'User\OrderController@destroy')->name('order destroy');

Route::get('user/orden/{id_orden}/detalles', 'User\DetailController@index')->name('details index');
Route::get('user/orden/{id_orden}/carro/{id_carro}/detalle/agregar', 'User\DetailController@create')->name('detail create');
Route::post('user/orden/{id_orden}/carro/{id_carro}/detalle/guardar', 'User\DetailController@store')->name('detail store');
Route::delete('user/orden/{id_orden}/detalle/{id_detalle}/borrar', 'User\DetailController@destroy')->name('detail destroy');


Route::get('user/clientes', 'User\CustomerController@index')->name('user clients');
Route::get('user/clientes/add', 'User\CustomerController@create')->name('user clients add');
Route::get('user/clientes/edit/{id}', 'User\CustomerController@edit')->name('user clients edit');
Route::post('user/clientes/store', 'User\CustomerController@store')->name('user clients store');
Route::put('user/clientes/update/{id}', 'User\CustomerController@update')->name('user clients update');
Route::delete('user/clientes/delete/{id}', 'User\CustomerController@destroy')->name('user clients delete');

});

