@extends('adminlte::page')

@section('title', 'Ingreso de Tipos')

@section('content_header')
    <h1>Ingresar Tipos</h1>
@stop

@section('content')
    <form action="{{route('categoriasalas.update',$categoria->ID_CATEGORIA_SALA)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Tipo:</label>
            <input id="CATEGORIA_SALA" name="CATEGORIA_SALA" type="text" class="form-control @error('CATEGORIA_SALA') is-invalid @enderror" value="{{$categoria->CATEGORIA_SALA}}" placeholder="Ej: BODEGA" tabindex="2">
            @error('CATEGORIA_SALA')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <a href="{{route('categoriasalas.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop
