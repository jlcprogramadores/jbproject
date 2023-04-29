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


///
Route::get('subir-archivo', [App\Http\Controllers\FileUploadController::class, 'index'])->name('files.index');
Route::post('file-upload/upload-large-files', [App\Http\Controllers\FileUploadController::class, 'uploadLargeFiles'])->name('files.upload.large');
///

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
Route::resource('historial-contratos', App\Http\Controllers\HistorialContratoController::class);
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
Route::resource('historial-paros', App\Http\Controllers\HistorialParoController::class);
Route::resource('documentos-candidatos', App\Http\Controllers\DocumentosCandidatoController::class);
Route::resource('archivos', App\Http\Controllers\ArchivoController::class);
Route::resource('accesos', App\Http\Controllers\AccesoController::class);
// Cadena de suministros
Route::resource('productos', App\Http\Controllers\ProductoController::class);
Route::resource('stocks', App\Http\Controllers\StockController::class);
Route::resource('control-gasolineras', App\Http\Controllers\ControlGasolineraController::class);
Route::resource('gasolineras', App\Http\Controllers\GasolineraController::class);
Route::resource('destinos', App\Http\Controllers\DestinoController::class);
// stock
Route::get('/resumen', 'App\Http\Controllers\StockController@resumen')->name('stocks.resumen');
Route::get('/entradas', 'App\Http\Controllers\StockController@entradas')->name('stocks.entradas');
Route::get('/salidas', 'App\Http\Controllers\StockController@salidas')->name('stocks.salidas');
// stock - editar
Route::get('/editentradas/{id}', 'App\Http\Controllers\StockController@editentradas')->name('stocks.editentradas');
Route::get('/editsalidas/{id}', 'App\Http\Controllers\StockController@editsalidas')->name('stocks.editsalidas');


Route::get('/crear-entrada', 'App\Http\Controllers\StockController@createEntrada')->name('stocks.create-entrada');
Route::get('/crear-salida', 'App\Http\Controllers\StockController@createSalida')->name('stocks.create-salida');
Route::get('/graficasGasolinerasRango', 'App\Http\Controllers\ControlGasolineraController@graficasGasolinerasRango')->name('control-gasolineras.graficasGasolinerasRango');
Route::post('/graficasRango', 'App\Http\Controllers\ControlGasolineraController@graficasRango')->name('control-gasolineras.graficasRango');
Route::get('/graficasGasolinerasUnidad', 'App\Http\Controllers\ControlGasolineraController@graficasGasolinerasUnidad')->name('control-gasolineras.graficasGasolinerasUnidad');
Route::post('/graficasUnidad', 'App\Http\Controllers\ControlGasolineraController@graficasUnidad')->name('control-gasolineras.graficasUnidad');
// index con emplado_id
Route::get('/historial-contrato/{id}', 'App\Http\Controllers\HistorialContratoController@index')->name('historial-contrato.index');

// documentos-candidatos
Route::get('/DocCandidato/{id}', 'App\Http\Controllers\DocumentosCandidatoController@index')->name('documentos-candidatos.doccandidato');

Route::get('/direccionproveedor/{id}', 'App\Http\Controllers\DireccioneController@direccionproveedor')->name('direcciones.direccionproveedor');
Route::get('/telefonoproveedor/{id}', 'App\Http\Controllers\TelefonoController@telefonoproveedor')->name('telefonos.telefonoproveedor');
Route::get('/direccioncliente/{id}', 'App\Http\Controllers\DireccioneController@direccioncliente')->name('direcciones.direccioncliente');
Route::get('/telefonocliente/{id}', 'App\Http\Controllers\TelefonoController@telefonocliente')->name('telefonos.telefonocliente');
Route::get('getCategoriByFamilia', 'App\Http\Controllers\CategoriasFamiliaController@getCategoriByFamilia')->name('categorias-familias.getCategoriByFamilia');
Route::get('getEmpleadosByGrupo', 'App\Http\Controllers\GruposEmpleadoController@getEmpleadosByGrupo')->name('grupos.getEmpleadosByGrupo');
Route::get('/edit/{id}', 'App\Http\Controllers\UserController@edit')->name('usuarios.edit');
Route::put('usuarios/{user}/update', 'App\Http\Controllers\UserController@update')->name('usuarios.update');
Route::get('/cuentabancariaproveedor/{id}', 'App\Http\Controllers\CuentasBancariaController@cuentabancariaproveedor')->name('cuentas-bancarias.cuentabancariaproveedor');
Route::get('/poblacion', 'App\Http\Controllers\EmpleadoController@poblacion')->name('empleados.poblacion');
Route::get('/poblaciondetalle/{id}', 'App\Http\Controllers\EmpleadoController@poblaciondetalle')->name('empleados.poblaciondetalle');
// empleado 
Route::get('/capacitaciones/{id}', 'App\Http\Controllers\EmpleadoController@capacitaciones')->name('empleados.capacitaciones');
Route::get('/formContrato/{id}', 'App\Http\Controllers\EmpleadoController@formContrato')->name('empleados.formContrato');
Route::post('/updateContrato', 'App\Http\Controllers\EmpleadoController@updateContrato')->name('empleados.updateContrato');

Route::get('/evaluar/{id}', 'App\Http\Controllers\CandidatoController@evaluar')->name('candidatos.evaluar');
Route::get('/editarfechalimite/{id}', 'App\Http\Controllers\EmpleadoController@editarfechalimite')->name('empleados.editarfechalimite');
Route::post('/actualizarfechalimite', 'App\Http\Controllers\EmpleadoController@actualizarfechalimite')->name('empleados.actualizarfechalimite');
Route::get('/editExpediente/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@editExpediente')->name('empleado-expedientes.editExpediente');
Route::get('/docsFaltantes/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@docsFaltantes')->name('empleado-expedientes.docsFaltantes');
// expediente-empleado
Route::get('/showPorEmpleado/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@showPorEmpleado')->name('empleado-expedientes.showPorEmpleado');
Route::get('/Amonestacion/{id}', 'App\Http\Controllers\EmpleadoExpedienteController@Amonestacion')->name('empleado-expedientes.Amonestacion');

Route::get('/grupoPorEmpleados/{id}', 'App\Http\Controllers\GruposEmpleadoController@grupoPorEmpleados')->name('grupos-empleado.grupoPorEmpleados');
Route::get('/formEmpleadoGrupo/{idGrupo}', 'App\Http\Controllers\GruposEmpleadoController@formEmpleadoGrupo')->name('grupos-empleados.formEmpleadoGrupo');
Route::get('/formEmpleadoNuevoGrupo/{idGrupo}', 'App\Http\Controllers\GruposEmpleadoController@formEmpleadoNuevoGrupo')->name('grupos-empleados.formEmpleadoNuevoGrupo');
Route::get('/formGrupoNombre/{idGrupo}', 'App\Http\Controllers\GruposController@formGrupoNombre')->name('grupos.formGrupoNombre');
// top
Route::get('/topGeneral', 'App\Http\Controllers\FinanzaController@topGeneral')->name('finanzas.topGeneral');
Route::get('/indexEgreso', 'App\Http\Controllers\FinanzaController@indexEgreso')->name('finanzas.indexEgreso');
Route::get('/indexIngreso', 'App\Http\Controllers\FinanzaController@indexIngreso')->name('finanzas.indexIngreso');

// finanzas
Route::get('/ingreso', 'App\Http\Controllers\FinanzaController@ingreso')->name('finanzas.ingreso');
Route::get('/egreso', 'App\Http\Controllers\FinanzaController@egreso')->name('finanzas.egreso');
Route::post('/storeIngreso', 'App\Http\Controllers\FinanzaController@storeIngreso')->name('finanzas.storeIngreso');
Route::post('/storeEgreso', 'App\Http\Controllers\FinanzaController@storeEgreso')->name('finanzas.storeEgreso');
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
// Forms de editar en finanzas
Route::get('/editEgreso/{id}', 'App\Http\Controllers\FinanzaController@editEgreso')->name('finanzas.editEgreso');
Route::get('/editIngreso/{id}', 'App\Http\Controllers\FinanzaController@editIngreso')->name('finanzas.editIngreso');
Route::get('/editEgresoMeses/{id}', 'App\Http\Controllers\FinanzaController@editEgresoMeses')->name('finanzas.editEgresoMeses');
// delete 
Route::post('/finanza_destroy/{id}', 'App\Http\Controllers\FinanzaController@destroy')->name('finanzas.destroy');

// historial-altas
Route::get('/crearporempleado/{id}', 'App\Http\Controllers\HistorialAltaController@crearporempleado')->name('historial-altas.crearporempleado');
Route::post('/storeporempleado', 'App\Http\Controllers\HistorialAltaController@storeporempleado')->name('historial-altas.storeporempleado');
// historial-paros
Route::get('/historialempleado/{id}', 'App\Http\Controllers\HistorialParoController@historialempleado')->name('historial-paros.historialempleado');

//Paros
Route::get('/createParoGrupo', 'App\Http\Controllers\ParoController@createParoGrupo')->name('paros.createParoGrupo');
Route::post('/storeParoGrupo', 'App\Http\Controllers\ParoController@storeParoGrupo')->name('paros.storeParoGrupo');

// recibir en base a un exel
Route::get('/importar', 'App\Http\Controllers\EntradaController@importar')->name('paros.importar');
Route::post('/exel', 'App\Http\Controllers\EntradaController@exel')->name('entradas.exel');

// datos
// Route::get('/datos-users', 'App\Http\Controllers\UserController@datos')->name('usuarios.datos');
Route::get('/datos-finanzas', 'App\Http\Controllers\FinanzaController@datos')->name('finanzas.datos');



// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes(['verify' => true]);