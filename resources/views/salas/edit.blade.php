@extends('adminlte::page')

@section('title', 'Modificar sala')

@section('content_header')
    <h1>Modificar Sala o Bodega</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('salas.update',$sala->ID_SALA) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NOMBRE_SALA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre de la sala o bodega:</label>
            <input type="text" class="form-control{{ $errors->has('NOMBRE_SALA') ? ' is-invalid' : '' }}" id="NOMBRE_SALA" name="NOMBRE_SALA" value="{{$sala->NOMBRE_SALA }}" required>
            @if ($errors->has('NOMBRE_SALA'))
                <div class="invalid-feedback">
                    {{ $errors->first('NOMBRE_SALA') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ID_CATEGORIA_SALA" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Tipo:</label>
            <select class="form-control{{ $errors->has('ID_CATEGORIA_SALA') ? ' is-invalid' : '' }}" aria-label="Seleccione el tipo de sala" id="ID_CATEGORIA_SALA" name="ID_CATEGORIA_SALA" required>
                <option value="" selected>--Seleccione un tipo--</option>
                @foreach($categorias as $categoria)
                    <option value="{{ $categoria->ID_CATEGORIA_SALA }}" {{ $sala->ID_CATEGORIA_SALA == $categoria->ID_CATEGORIA_SALA ? 'selected' : '' }}>
                        {{ $categoria->CATEGORIA_SALA }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('ID_CATEGORIA_SALA'))
                <div class="invalid-feedback">
                    {{ $errors->first('ID_CATEGORIA_SALA') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="CAPACIDAD_PERSONAS" class="form-label"><i class="fa-solid fa-person-shelter"></i> Capacidad personas:</label>
            <input type="number" class="form-control{{ $errors->has('CAPACIDAD_PERSONAS') ? ' is-invalid' : '' }}" id="CAPACIDAD_PERSONAS" name="CAPACIDAD_PERSONAS" value="{{ $sala->CAPACIDAD_PERSONAS }}" min="0" required>
            @if ($errors->has('CAPACIDAD_PERSONAS'))
                <div class="invalid-feedback">
                    {{ $errors->first('CAPACIDAD_PERSONAS') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ESTADO_SALA" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Estado:</label>
            <select class="form-control{{ $errors->has('ESTADO_SALA') ? ' is-invalid' : '' }}" aria-label="Seleccione el tipo de sala" id="ESTADO_SALA" name="ESTADO_SALA" required>
                <option value="" selected>--Seleccione un estado--</option>
                <option value="DISPONIBLE" {{ $sala->ESTADO_SALA == 'DISPONIBLE' ? 'selected' : '' }}>Disponible</option>
                <option value="OCUPADO" {{ $sala->ESTADO_SALA == 'OCUPADO' ? 'selected' : '' }}>Ocupado</option>
                <option value="DESABILITADO" {{ $sala->ESTADO_SALA == 'DESABILITADO' ? 'selected' : '' }}>Desabilitado</option>
            </select>
            @if ($errors->has('ESTADO_SALA'))
                <div class="invalid-feedback">
                    {{ $errors->first('ESTADO_SALA') }}
                </div>
            @endif
        </div>

        <a href="{{route('salas.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>
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
