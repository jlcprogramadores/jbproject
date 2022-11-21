<?php

use Illuminate\Support\Facades\Route;

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

Route::view('/', 'home')->name('home');
Route::view('menu', 'menu')->name('menu');

Route::resource('familias', App\Http\Controllers\FamiliaController::class);
Route::resource('categorias-familias', App\Http\Controllers\CategoriasFamiliaController::class);
Route::resource('ivas', App\Http\Controllers\IvaController::class);
Route::resource('unidades', App\Http\Controllers\UnidadeController::class);
Route::resource('proyectos', App\Http\Controllers\ProyectoController::class);
Route::resource('clientes', App\Http\Controllers\ClienteController::class);
Route::resource('telefonos', App\Http\Controllers\TelefonoController::class);
Route::resource('tipo-de-direcciones', App\Http\Controllers\TipoDeDireccioneController::class);
Route::resource('proveedores', App\Http\Controllers\ProveedoreController::class);
Route::resource('salidas', App\Http\Controllers\SalidaController::class);
Route::resource('facturas', App\Http\Controllers\FacturaController::class);
Route::resource('tipo-de-ingresos', App\Http\Controllers\TipoDeIngresoController::class);
Route::resource('categorias-de-entradas', App\Http\Controllers\CategoriasDeEntradaController::class);
Route::resource('finanzas', App\Http\Controllers\FinanzaController::class);
Route::resource('proveedores', App\Http\Controllers\ProveedoreController::class);
Route::resource('cuentas-bancarias', App\Http\Controllers\CuentasBancariaController::class);
Route::resource('direcciones', App\Http\Controllers\DireccioneController::class);
Route::resource('entradas', App\Http\Controllers\EntradaController::class);
Route::resource('usuarios', App\Http\Controllers\UserController::class);
Route::get('/direccionproveedor/{id}', 'App\Http\Controllers\DireccioneController@direccionproveedor')->name('direcciones.direccionproveedor');
Route::get('/telefonoproveedor/{id}', 'App\Http\Controllers\TelefonoController@telefonoproveedor')->name('telefonos.telefonoproveedor');
Route::get('/direccioncliente/{id}', 'App\Http\Controllers\DireccioneController@direccioncliente')->name('direcciones.direccioncliente');
Route::get('/telefonocliente/{id}', 'App\Http\Controllers\TelefonoController@telefonocliente')->name('telefonos.telefonocliente');
Route::get('/ingreso', 'App\Http\Controllers\FinanzaController@ingreso')->name('finanzas.ingreso');
Route::get('/egreso', 'App\Http\Controllers\FinanzaController@egreso')->name('finanzas.egreso');
Route::post('/storeIngreso', 'App\Http\Controllers\FinanzaController@storeIngreso')->name('finanzas.storeIngreso');
Route::post('/storeEgreso', 'App\Http\Controllers\FinanzaController@storeEgreso')->name('finanzas.storeEgreso');
Route::get('/correo/{id}', 'App\Http\Controllers\FinanzaController@correo')->name('finanzas.correo');
Route::get('/enviarCorreo/{id}', 'App\Http\Controllers\FinanzaController@enviarCorreo')->name('finanzas.enviarCorreo');
// Route::get('/enviarCorreo', function () {
//     $correo = new ComprobanteMailable;
//     Mail::to('ciat117@gmail.com')->send($correo);
//     return "Mensaje Enviado";
// });

Auth::routes(['verify' => true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

