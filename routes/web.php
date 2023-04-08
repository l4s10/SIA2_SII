<?php

use Illuminate\Support\Facades\Route;

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
});
//Dashboard para modulo reserva salas y visitas a bodega
Route::get('/reservas', function(){
    return view('reservasalas.index');
});
//Rutas para articulos (TEST de CRUD)
Route::resource('articulos','App\Http\Controllers\ArticuloController');
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
//Rutas para solicitudes de salas y bodegas


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
