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

Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('cliente.tabla');


Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

