@extends('adminlte::page')

@section('title', 'Ingreso de Tipos')

@section('content_header')
    <h1>Ingresar Tipos</h1>
@stop

@section('content')
    <div class="container">
        <form action="/tipoequipos" method="POST">
            @csrf
            <div class="form-group">
                <label for="TIPO_EQUIPO" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Tipo:</label>
                <input id="TIPO_EQUIPO" name="TIPO_EQUIPO" type="text" class="form-control @error('TIPO_EQUIPO') is-invalid @enderror" value="{{old('TIPO_EQUIPO')}}" placeholder="Ej: NOTEBOOK" tabindex="2">
                @error('TIPO_EQUIPO')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <a href="/tipoequipos" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop
