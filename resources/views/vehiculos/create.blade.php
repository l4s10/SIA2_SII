@extends('adminlte::page')

@section('title', 'CRUD con laravel 10')

@section('content_header')
    <h1>Ingresar vehiculo</h1>
@stop

@section('content')
    <form action="{{route('vehiculos.store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Patente</label>
            <input id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" type="text" class="form-control" tabindex="1">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo</label>
            <input id="TIPO_VEHICULO" name="TIPO_VEHICULO" type="text" class="form-control" tabindex="2">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Marca</label>
            <input id="MARCA" name="MARCA" type="text" class="form-control" tabindex="3">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Modelo</label>
            <input id="MODELO_VEHICULO" name="MODELO_VEHICULO" type="text" class="form-control" tabindex="4">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Año</label>
            <input id="ANO_VEHICULO" name="ANO_VEHICULO" type="text" class="form-control" tabindex="5">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Unidad</label>
            <input id="UNIDAD_VEHICULO" name="UNIDAD_VEHICULO" type="text" class="form-control" tabindex="6">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Estado</label>
            <input id="ESTADO_VEHICULO" name="ESTADO_VEHICULO" type="text" class="form-control" tabindex="7">
        </div>

        <a href="{{route('vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
