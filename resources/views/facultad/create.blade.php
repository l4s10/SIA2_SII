@extends('adminlte::page')

@section('title', 'Ingreso de Facultad')

@section('content_header')
    <h1>Ingresar Facultad</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('facultades.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NOMBRE" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre:</label>
            <input type="text" class="form-control{{ $errors->has('NOMBRE') ? ' is-invalid' : '' }}" id="NOMBRE" name="NOMBRE" value="{{ old('NOMBRE') }}" placeholder="Ej: APLICAR SANCIONES ADMINISTRATIVAS" required>
            @if ($errors->has('NOMBRE'))
                <div class="invalid-feedback">
                    {{ $errors->first('NOMBRE') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="CONTENIDO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Contenido:</label>
            <input type="text" class="form-control{{ $errors->has('CONTENIDO') ? ' is-invalid' : '' }}" id="NOMBRE" name="CONTENIDO" value="{{ old('CONTENIDO') }}" placeholder="Ej: La facultad de aplicar las sanciones..." required>
            @if ($errors->has('CONTENIDO'))
                <div class="invalid-feedback">
                    {{ $errors->first('CONTENIDO') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="LEY_ASOCIADA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Ley asociada: </label>
            <input type="text" class="form-control{{ $errors->has('LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="LEY_ASOCIADA" name="LEY_ASOCIADA" value="{{ old('LEY_ASOCIADA') }}" placeholder="Ej: Código Tributario" required>
            @if ($errors->has('LEY_ASOCIADA'))
                <div class="invalid-feedback">
                    {{ $errors->first('LEY_ASOCIADA') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ART_LEY_ASOCIADA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Art. de ley asociada:</label>
            <input type="text" class="form-control{{ $errors->has('ART_LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="NOMBRE" name="ART_LEY_ASOCIADA" value="{{ old('ART_LEY_ASOCIADA') }}" placeholder="Ej: 165" required>
            @if ($errors->has('ART_LEY_ASOCIADA'))
                <div class="invalid-feedback">
                    {{ $errors->first('ART_LEY_ASOCIADA') }}
                </div>
            @endif
        </div>



        <a href="{{route('facultades.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar facultad</button>
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

