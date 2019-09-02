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
Route::view('modelos', 'admin/models')->name('admin models');
Route::view('modelos/add', 'admin/add_model')->name('admin models add');
Route::view('tipos', 'admin/types')->name('admin types');
Route::view('tipos/add', 'admin/add_type')->name('admin types add');
Route::view('/admin/tipos', 'admin/types')->name('admin types');
Route::view('/admin/tipos/add', 'admin/add_type')->name('admin types add');
});

Route::group(['middleware'=>['check.user.role']], function(){
//RUTAS USERS
Route::get('/car', 'User\CarController@index')->name('user home');
Route::delete('/car/borrar/{id}', 'User\CarController@destroy')->name('car destroy');
Route::view('/detalles', 'user/details')->name('user detalles');
Route::view('/orden', 'user/new_order')->name('user orden');
Route::view('/carro', 'user/new_car')->name('user carro');
Route::view('/ordenes', 'user/order_view');
Route::view('/clientes', 'user/client_view');
Route::view('/cliente', 'user/new_client');
});

