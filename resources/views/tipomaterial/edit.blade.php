@extends('adminlte::page')

@section('title', 'CRUD con laravel 10')

@section('content_header')
    <h1>Editar Tipo Material</h1>
@stop

@section('content')
    <form action="/tipomaterial/{{$tipo->ID_TIPO_MAT}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre Tipo</label>
            <input id="TIPO_MATERIAL" name="TIPO_MATERIAL" type="text" class="form-control" value="{{$tipo->TIPO_MATERIAL}}">
        </div>
        <a href="/tipomaterial" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop