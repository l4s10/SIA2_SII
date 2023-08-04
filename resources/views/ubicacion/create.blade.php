@extends('adminlte::page')

@section('title', 'Ingreso de Ubicacion')

@section('content_header')
    <h1>Ingreso de Ubicación o Departamento</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('ubicacion.store') }}" method="POST">
        @csrf


        <div class="mb-3">
            <label for="UBICACION" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre:</label>
            <input type="text" class="form-control{{ $errors->has('UBICACION') ? ' is-invalid' : '' }}" id="UBICACION" name="UBICACION" value="{{ old('UBICACION') }}" placeholder="Ej: DEPARTAMENTO DE ADMINISTRACION / UNIDAD DE CONCEPCIÓN" required>
            @if ($errors->has('UBICACION'))
                <div class="invalid-feedback">
                    {{ $errors->first('UBICACION') }}
                </div>
            @endif
        </div>

        {{-- OPCION QUE PERMITE SELECCIONAR DIRECCION REGIONAL (PARA REGION METROPOLITANA) --}}
        <div class="mb-3 form-group">
            <label for="ID_DIRECCION">Dirección Regional asociada:</label>
            <select name="ID_DIRECCION" id="ID_DIRECCION" class="form-control">
                <option value="{{ $direccionRegional->ID_DIRECCION }}">{{ $direccionRegional->DIRECCION }}</option>
            </select>
        </div>
        

        <a href="{{route('ubicacion.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
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

