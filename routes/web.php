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
Route::resource('roles', App\Http\Controllers\RoleController::class);
Route::resource('empleados', App\Http\Controllers\EmpleadoController::class);
Route::resource('puestos', App\Http\Controllers\PuestoController::class);
Route::resource('paros', App\Http\Controllers\ParoController::class);
Route::resource('expedientes', App\Http\Controllers\ExpedienteController::class);
Route::resource('empleado-expedientes', App\Http\Controllers\EmpleadoExpedienteController::class);
Route::resource('candidatos', App\Http\Controllers\CandidatoController::class);
Route::resource('minas', App\Http\Controllers\MinaController::class);
Route::resource('incidencias', App\Http\Controllers\IncidenciaController::class);
Route::resource('historial-altas', App\Http\Controllers\HistorialAltaController::class);
Route::resource('grupos', App\Http\Controllers\GrupoController::class);
Route::resource('grupos-empleados', App\Http\Controllers\GruposEmpleadoController::class);

Route::get('/direccionproveedor/{id}', 'App\Http\Controllers\DireccioneController@direccionproveedor')->name('direcciones.direccionproveedor');
Route::get('/telefonoproveedor/{id}', 'App\Http\Controllers\TelefonoController@telefonoproveedor')->name('telefonos.telefonoproveedor');
Route::get('/direccioncliente/{id}', 'App\Http\Controllers\DireccioneController@direccioncliente')->name('direcciones.direccioncliente');
Route::get('/telefonocliente/{id}', 'App\Http\Controllers\TelefonoController@telefonocliente')->name('telefonos.telefonocliente');
Route::get('getCategoriByFamilia', 'App\Http\Controllers\CategoriasFamiliaController@getCategoriByFamilia')->name('categorias-familias.getCategoriByFamilia');
Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('usuarios.edit');
Route::put('usuarios/{user}/update', 'App\Http\Controllers\UserController@update')->name('usuarios.update');
Route::get('/cuentabancariaproveedor/{id}', 'App\Http\Controllers\CuentasBancariaController@cuentabancariaproveedor')->name('cuentas-bancarias.cuentabancariaproveedor');
Route::get('/poblacion', 'App\Http\Controllers\EmpleadoController@poblacion')->name('empleados.poblacion');
Route::get('/poblaciondetalle/{id}', 'App\Http\Controllers\EmpleadoController@poblaciondetalle')->name('empleados.poblaciondetalle');
Route::get('/capacitaciones/{id}', 'App\Http\Controllers\EmpleadoController@capacitaciones')->name('empleados.capacitaciones');
Route::get('/evaluar/{id}', 'App\Http\Controllers\CandidatoController@evaluar')->name('candidatos.evaluar');
Route::get('/editarfechalimite/{id}', 'App\Http\Controllers\EmpleadoController@editarfechalimite')->name('empleados.editarfechalimite');
Route::post('/actualizarfechalimite', 'App\Http\Controllers\EmpleadoController@actualizarfechalimite')->name('empleados.actualizarfechalimite');
Route::get('/editExpediente/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@editExpediente')->name('empleado-expedientes.editExpediente');
Route::get('/docsFaltantes/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@docsFaltantes')->name('empleado-expedientes.docsFaltantes');
Route::get('/showPorEmpleado/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@showPorEmpleado')->name('empleado-expedientes.showPorEmpleado');
Route::get('/grupoPorEmpleados/{id}', 'App\Http\Controllers\GruposEmpleadoController@grupoPorEmpleados')->name('grupos-empleado.grupoPorEmpleados');
// fiananzas
Route::get('/ingreso', 'App\Http\Controllers\FinanzaController@ingreso')->name('finanzas.ingreso');
Route::get('/egreso', 'App\Http\Controllers\FinanzaController@egreso')->name('finanzas.egreso');
Route::get('/indexEgreso', 'App\Http\Controllers\FinanzaController@indexEgreso')->name('finanzas.indexEgreso');
Route::get('/indexIngreso', 'App\Http\Controllers\FinanzaController@indexIngreso')->name('finanzas.indexIngreso');
Route::post('/storeIngreso', 'App\Http\Controllers\FinanzaController@storeIngreso')->name('finanzas.storeIngreso');
Route::post('/storeEgreso', 'App\Http\Controllers\FinanzaController@storeEgreso')->name('finanzas.storeEgreso');
Route::get('/topGeneral', 'App\Http\Controllers\FinanzaController@topGeneral')->name('finanzas.topGeneral');
Route::get('/confirmarPago/{id}', 'App\Http\Controllers\FinanzaController@confirmarPago')->name('finanzas.confirmarPago');
Route::post('/top', 'App\Http\Controllers\FinanzaController@top')->name('finanzas.top');
Route::get('/showTopIngreso/{id}', 'App\Http\Controllers\FinanzaController@showTopIngreso')->name('finanzas.showTopIngreso');
Route::get('/showTopEgreso/{id}', 'App\Http\Controllers\FinanzaController@showTopEgreso')->name('finanzas.showTopEgreso');
Route::get('/correo/{id}', 'App\Http\Controllers\FinanzaController@correo')->name('finanzas.correo');
Route::get('/enviarCorreo/{id}', 'App\Http\Controllers\FinanzaController@enviarCorreo')->name('finanzas.enviarCorreo');
Route::get('/facturafinanzas/{id}', 'App\Http\Controllers\FacturaController@facturafinanzas')->name('facturas.facturafinanzas');
Route::get('/filtros', 'App\Http\Controllers\FinanzaController@filtros')->name('finanzas.filtros');
Route::post('/datosfiltrados', 'App\Http\Controllers\FinanzaController@datosfiltrados')->name('finanzas.datosfiltrados');
Route::get('/graficasProyectos', 'App\Http\Controllers\FinanzaController@graficasProyectos')->name('finanzas.graficasProyectos');
Route::get('/graficasGenerales', 'App\Http\Controllers\FinanzaController@graficasGenerales')->name('finanzas.graficasGenerales');
Route::post('/graficas', 'App\Http\Controllers\FinanzaController@graficas')->name('finanzas.graficas');
Route::get('/centrodecostos', 'App\Http\Controllers\FinanzaController@centrodecostos')->name('finanzas.centrodecostos');
Route::get('/egresoMeses', 'App\Http\Controllers\FinanzaController@egresoMeses')->name('finanzas.egresoMeses');
Route::post('/storeEgresoMeses', 'App\Http\Controllers\FinanzaController@storeEgresoMeses')->name('finanzas.storeEgresoMeses');

// historial-altas
Route::get('/crearporempleado/{id}', 'App\Http\Controllers\HistorialAltaController@crearporempleado')->name('historial-altas.crearporempleado');
Route::post('/storeporempleado', 'App\Http\Controllers\HistorialAltaController@storeporempleado')->name('historial-altas.storeporempleado');


Auth::routes(['verify' => true]);
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');