<?php

use App\Http\Controllers\BusquedaFuncionarioController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\SolicitudSalaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UbicacionesController;
use App\Http\Controllers\DireccionRegionalController;
use App\Http\Controllers\EmailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::post('/send-email', [EmailController::class, 'sendEmail'])->name('send.email');

Route::get('/', function () {
    return view('auth.login');
})->name('login');
//Rutas para testear vistas
Route::get('/repyman', function(){
    return view('repyman.index');
})->name('repyman.index')->middleware('auth');

//Ruta para acceder al módulo de directivos:
Route::get('/directivos', function(){
    return view('directivos.index');
})->name('directivos.index')->middleware('auth');

//*RUTAS PARA INDEX DE GRAFICOS*/
Route::get('/reporteshome', 'App\Http\Controllers\HomeReportesController@Home')->name('reporteshome.home');
//Ruta para REPORTES DE VEHICULOS
Route::get('reporteshome/Vehiculos', 'App\Http\Controllers\HomeReportesController@VehiculosReport')->name('reporteshome.vehiculos');
//RUTAS PARA REPORTES DE MATERIALES
Route::get('/reporteshome/Materiales', 'App\Http\Controllers\HomeReportesController@MaterialsReport')->name('reporteshome.materiales');
//GRAFICOS REPARACIONES Y MANTENCIONES
Route::get('/reporteshome/Repyman','App\Http\Controllers\HomeReportesController@ReparacionesMantencionesReport')->name('reporteshome.repyman');
//GRAFICOS PARA EQUIPOS
Route::get('/reporteshome/Equipos', 'App\Http\Controllers\HomeReportesController@EquiposReport')->name('reporteshome.equipos');
//GRAFICOS PARA RESERVAS (SALAS Y BODEGAS)
Route::get('/reporteshome/Reservas', 'App\Http\Controllers\HomeReportesController@ReservasReport')->name('reporteshome.reservas');
//GRAFICOS PARA INVENTARIO
Route::get('/reporteshome/Inventario', 'App\Http\Controllers\HomeReportesController@InventarioReport')->name('reporteshome.inventario');
//GRAFICOS PARA SISTEMA (TABLAS DE CONTINGENCIA)
Route::get('/reporteshome/System', 'App\Http\Controllers\HomeReportesController@SystemReport')->name('reporteshome.system');
//Dashboard para modulo reserva salas y visitas a bodega
Route::get('/reservas', function(){
    return view('reservas.dashboard');
})->name('reservas.dashboard')->middleware('auth');

//Dasboard para el modulo de
//Rutas para materiales
Route::get('materiales/exportar-pdf', 'App\Http\Controllers\MaterialController@exportToPDF')->name('materiales.exportar-pdf');
Route::get('materiales/descargar-PDF', 'App\Http\Controllers\MaterialController@report')->name('materiales.report');
Route::resource('materiales','App\Http\Controllers\MaterialController');

//Rutas para tipos de materiales.
Route::resource('tipomaterial','App\Http\Controllers\TipoMaterialController');
//Rutas para solicitud de materiales
Route::resource('solmaterial','App\Http\Controllers\SolMatController');
//Rutas para reparaciones
Route::resource('reparaciones','App\Http\Controllers\RelFunRepGeneralController');
//Rutas para reparaciones y mantenciones vehiculares
Route::resource('repvehiculos','App\Http\Controllers\SolicitudReparacionVehiculoController');
//rutas para vehiculos
Route::resource('vehiculos','App\Http\Controllers\VehiculoController');
//Rutas para formularios
Route::resource('formularios','App\Http\Controllers\FormularioController');
//Rutas para solicitar formularios
Route::resource('formulariosSol','App\Http\Controllers\SolicitudFormularioController');
//Rutas para tipos de equipos
Route::resource('tipoequipos','App\Http\Controllers\TipoEquiposController');
//Rutas para equipos
Route::resource('equipos','App\Http\Controllers\EquipoController');
//Rutas para solicitudes de equipos
Route::resource('solequipos','App\Http\Controllers\SolicitudEquiposController');
//Rutas categoría salas
Route::resource('categoriasalas','App\Http\Controllers\CategoriaSalaController');
//Rutas salas
Route::resource('salas','App\Http\Controllers\SalaController');
//Rutas region
Route::resource('region','App\Http\Controllers\RegionController');
//Rutas comuna
Route::resource('comuna','App\Http\Controllers\ComunaController');
//Rutas direccion regional
Route::resource('direccionregional','App\Http\Controllers\DireccionRegionalController');
//Rutas resolucion
Route::resource('resolucion','App\Http\Controllers\ResolucionController');
//Ruta para obtener documento asociado a una resolucion
Route::get('resoluciones/{filename}', 'App\Http\Controllers\ResolucionController@showDocumento')->name('resolucion.documento');
//
//Rutas poliza
Route::resource('polizas','App\Http\Controllers\PolizaController');
//Rutas cargo
Route::resource('cargos','App\Http\Controllers\CargoController');
//Rutas ubicación
Route::resource('ubicacion','App\Http\Controllers\UbicacionesController');
//Rutas facultad
Route::resource('facultades','App\Http\Controllers\FacultadController');

//Rutas busquedafuncionario
Route::resource('busquedafuncionario','App\Http\Controllers\BusquedaFuncionarioController');
//Rutas Ajax para consulta en tiempo real de funcionarios
Route::get('/consultaAjax', [BusquedaFuncionarioController::class, 'buscarFuncionarios']);
//Rutas busquedaavanzada
Route::resource('busquedaavanzada','App\Http\Controllers\BusquedaAvanzadaController');

// Rutas para el controlador SolicitudSalaController
Route::get('/solicitudes/all', [SolicitudSalaController::class, 'getAllSolicitudes'])->name('solicitudes.all');
Route::get('/solicitudes/byDates', [SolicitudSalaController::class, 'getSolicitudesByDates'])->name('solicitudes.byDates');
Route::resource('reserva/sala', 'App\Http\Controllers\SolicitudSalaController')->names([
    'index' => 'solicitud.salas.index',
    'create' => 'solicitud.salas.create',
    'store' => 'solicitud.salas.store',
    'show' => 'solicitud.salas.show',
    'edit' => 'solicitud.salas.edit',
    'update' => 'solicitud.salas.update',
    'destroy' => 'solicitud.salas.destroy',
]);
// Rutas para el controlador SolicitudBodegasControler
Route::resource('reserva/bodega', 'App\Http\Controllers\SolicitudBodegasController')->names([
    'index' => 'solicitud.bodegas.index',
    'create' => 'solicitud.bodegas.create',
    'store' => 'solicitud.bodegas.store',
    'show' => 'solicitud.bodegas.show',
    'edit' => 'solicitud.bodegas.edit',
    'update' => 'solicitud.bodegas.update',
    'destroy' => 'solicitud.bodegas.destroy',
]);
//**Rutas para solicitud vehiculos
//Exportable
Route::get('reserva/vehiculo/{id}/pdf', 'App\Http\Controllers\RelFunVehController@generarPDF')->name('solicitud.vehiculos.pdf');
//Formularion de edicion del vehiculo, solo que muestra los campos de rendicion
Route::get('reserva/vehiculo/{id}/rendicion', 'App\Http\Controllers\RelFunVehController@rendicion')->name('solicitud.vehiculos.rendicion');
//Ver solicitudes por rendir y autorizar
Route::get('reserva/vehiculo/rendir', 'App\Http\Controllers\RelFunVehController@indexRendir')->name('solicitud.vehiculos.rendir');
Route::get('reserva/vehiculo/autorizar', 'App\Http\Controllers\RelFunVehController@indexAutorizar')->name('solicitud.vehiculos.autorizar');
//POST PARA ENVIAR FIRMA -> RUT, NOMBRES Y APELLIDOS (INTEGRAR CON CLAVE UNICA)
Route::post('/reserva/vehiculos/{id}/autorizar', [App\Http\Controllers\RelFunVehController::class, 'autorizar'])->name('solicitud.vehiculos.authorize');
Route::post('/reserva/vehiculos/{id}/rechazar', [App\Http\Controllers\RelFunVehController::class, 'rechazar'])->name('solicitud.vehiculos.reject');


Route::resource('reserva/vehiculo', 'App\Http\Controllers\RelFunVehController')->names([
    'index' => 'solicitud.vehiculos.index',
    'create' => 'solicitud.vehiculos.create',
    'store' => 'solicitud.vehiculos.store',
    'show' => 'solicitud.vehiculos.show',
    'edit' => 'solicitud.vehiculos.edit',
    'update' => 'solicitud.vehiculos.update',
    'destroy' => 'solicitud.vehiculos.destroy',
]);
//Endpoint para usuarios
//Para filtros de registro usuarios
Route::get('/get-direcciones/{id}', [DireccionRegionalController::class, 'getDirecciones']);
Route::get('/get-ubicaciones/{id}', [UbicacionesController::class, 'getUbicaciones']);
//Para filtros de vehiculos
Route::get('/direccion/{ubicacionId}', [DireccionRegionalController::class, 'getDireccion']);
Route::get('/ubicaciones/{direccionId}', [UbicacionesController::class, 'getUbicaciones']);
Route::get('/usuarios/{ubicacionId}', [UserController::class, 'getUsuarios']);
Route::get('funcionarios/region/{id}', 'App\Http\Controllers\UserController@getUsersByRegion')->name('funcionarios.region');
Route::resource('funcionarios','App\Http\Controllers\UserController');

Route::post('/update-stock', [InventoryController::class, 'updateStock'])->name('update-stock');

Route::get('/home', [HomeController::class, 'index']);
// Esta es la ruta GET para mostrar la página
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
// Esta es la ruta POST para recibir las solicitudes AJAX
Route::post('/reportes/data', [ReporteController::class, 'obtenerDatos'])->name('reportes.data');
//RUTA GET PARA TABLA CONTINGENCIA
Route::get('/get-totals/{id}', [ReporteController::class, 'getTotalsPorUbicacion']);

// Route::middleware(['auth'])->group(function () {
//     Route::get('/dashboard', function () {
//         return redirect()->route(config('adminlte.dashboard_url'));
//     })->name('dashboard');
// });

//Route::group(['middleware' => 'checkUserRole'], function () {
    // Rutas que cargan las vistas del adminlte
//});

// Método Route::get
// Route::get('/home', function () {
//     return view('home.home');
// });

