<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;


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

Route::view('/', 'login')->name('login');
Route::view('home', 'home')->name('home');

Route::get('/cliente', 'App\Http\Controllers\ClienteController@index')->name('cliente.tabla');

// Route::get('/users', [UserController::class, 'index']);
// // or
// Route::get('/users', 'App\Http\Controllers\UserController@index');