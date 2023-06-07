<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('auth.login');
});
//Rutas para testear vistas
Route::get('/repyman', function(){
    return view('repyman.index');
})->name('repyman.index');
//Dashboard para modulo reserva salas y visitas a bodega
Route::get('/reservas', function(){
    return view('reservas.dashboard');
})->name('reservas.dashboard');
//Rutas para materiales
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
// Rutas para el controlador SolicitudSalaController
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
Route::resource('reserva/vehiculo', 'App\Http\Controllers\RelFunVehController')->names([
    'index' => 'solicitud.vehiculos.index',
    'create' => 'solicitud.vehiculos.create',
    'store' => 'solicitud.vehiculos.store',
    'show' => 'solicitud.vehiculos.show',
    'edit' => 'solicitud.vehiculos.edit',
    'update' => 'solicitud.vehiculos.update',
    'destroy' => 'solicitud.vehiculos.destroy',
]);
//Rutas para Funcionarios (usuarios)
Route::resource('funcionarios','App\Http\Controllers\UserController');

Route::post('/update-stock', [InventoryController::class, 'updateStock'])->name('update-stock');

Route::get('/home', [HomeController::class, 'index']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return redirect()->route(config('adminlte.dashboard_url'));
    })->name('dashboard');
});

// Método Route::get
// Route::get('/home', function () {
//     return view('home.home');
// });

