<?php

use App\Http\Controllers\HomeReportesController;
use App\Http\Controllers\ReporteController;
use Illuminate\Support\Facades\Route;

/* RUTAS PARA INDEX DE GRAFICOS */
Route::get('/reporteshome', [HomeReportesController::class, 'Home'])->name('reporteshome.home');
Route::get('reporteshome/Vehiculos', [HomeReportesController::class, 'VehiculosReport'])->name('reporteshome.vehiculos');
Route::get('/reporteshome/Materiales', [HomeReportesController::class, 'MaterialsReport'])->name('reporteshome.materiales');
Route::get('/reporteshome/Repyman', [HomeReportesController::class, 'ReparacionesMantencionesReport'])->name('reporteshome.repyman');
Route::get('/reporteshome/Equipos', [HomeReportesController::class, 'EquiposReport'])->name('reporteshome.equipos');
Route::get('/reporteshome/Reservas', [HomeReportesController::class, 'ReservasReport'])->name('reporteshome.reservas');
Route::get('/reporteshome/Inventario', [HomeReportesController::class, 'InventarioReport'])->name('reporteshome.inventario');
Route::get('/reporteshome/System', [HomeReportesController::class, 'SystemReport'])->name('reporteshome.system');

/* Rutas de ReporteController */
Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');
Route::post('/reportes/data', [ReporteController::class, 'obtenerDatos'])->name('reportes.data');
Route::get('/get-totals/{id}', [ReporteController::class, 'getTotalsPorUbicacion']);
