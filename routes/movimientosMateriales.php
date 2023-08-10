<?php

use Illuminate\Support\Facades\Route;

Route::resource('gestionarMaterial', 'App\Http\Controllers\MovimientoMaterialController')->names([
    'index' => 'gestionarMaterial.index',
    'create' => 'gestionarMaterial.create',
    'store' => 'gestionarMaterial.store',
    'show' => 'gestionarMaterial.show',
    'edit' => 'gestionarMaterial.edit',
    'update' => 'gestionarMaterial.update',
    'destroy' => 'gestionarMaterial.destroy',
]);
