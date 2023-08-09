@extends('adminlte::page')

@section('title', 'Ingreso de Tipos')

@section('content_header')
    <h1>Ingresar Tipos</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('tipomaterial.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Tipo:</label>
                <input id="TIPO_MATERIAL" name="TIPO_MATERIAL" type="text" class="form-control @error('TIPO_MATERIAL') is-invalid @enderror" value="{{old('TIPO_MATERIAL')}}" placeholder="Ej: ASEO" tabindex="2">
                @error('TIPO_MATERIAL')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ID_DIRECCION" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Direccion Regional:</label>
                <select id="ID_DIRECCION" name="ID_DIRECCION" class="form-control" disabled>
                    <option value="{{$direccionFiltradaId}}" selected>{{$direccionFiltradaNombre}}</option>
                </select>
                <input type="hidden" name="ID_DIRECCION" value="{{$direccionFiltradaId}}"> <!-- Esta línea asegura que el ID se envíe al servidor -->
            </div>

            <a href="{{route('tipomaterial.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar tipo</button>
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
