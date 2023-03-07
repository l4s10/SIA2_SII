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

//Rutas para articulos (TEST de CRUD)
Route::resource('articulos','App\Http\Controllers\ArticuloController');
//Rutas para materiales (MODULOS)
Route::resource('materiales','App\Http\Controllers\MaterialController');
//Rutas para tipos de materiales.
Route::resource('tipomaterial','App\Http\Controllers\TipoMaterialController');
//Rutas para materiales (SOLICITUDES)
Route::resource('solicitudmateriales','App\Http\Controllers\SolicitudMaterialesController');
//rutas para vehiculos
Route::resource('vehiculos','App\Http\Controllers\VehiculoController');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
