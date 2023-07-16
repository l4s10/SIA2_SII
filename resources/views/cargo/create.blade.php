@extends('adminlte::page')

@section('title', 'Ingreso de Cargo')

@section('content_header')
    <h1>Ingresar Cargo</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('cargos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="CARGO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre del cargo:</label>
            <input type="text" class="form-control{{ $errors->has('CARGO') ? ' is-invalid' : '' }}" id="CARGO" name="CARGO" value="{{ old('CARGO') }}" placeholder="Ej: JEFE DE DEPARTAMENTO" required>
            @if ($errors->has('CARGO'))
                <div class="invalid-feedback">
                    {{ $errors->first('CARGO') }}
                </div>
            @endif
        </div>

        {{-- OPCION QUE PERMITE SELECCIONAR DIRECCION REGIONAL --}}
        <div class="mb-3" class="form-group">
            <label for="ID_DIRECCION">Direccion Regional asociada:</label>
            <select name="ID_DIRECCION" id="ID_DIRECCION" class="form-control">
                @foreach($direccion as $idDireccion => $direccion)
                    <option value="{{ $idDireccion }}">{{ $direccion }}</option>
                @endforeach
            </select>
        </div>

        <a href="{{route('cargos.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar cargo</button>
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

