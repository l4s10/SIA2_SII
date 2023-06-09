@extends('adminlte::page')

@section('title', 'Ingreso de resolución delegatoria')

@section('content_header')
    <h1>Ingresar Resolución Delegatoria</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('resolucion.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NRO_RESOLUCION" class="form-label"><i class="fa-solid fa-book-bookmark"></i> N° Resolución:</label>
            <input type="text" class="form-control{{ $errors->has('NRO_RESOLUCION') ? ' is-invalid' : '' }}" id="NRO_RESOLUCION" name="NRO_RESOLUCION" value="{{ old('NRO_RESOLUCION') }}" placeholder="Ej: 1234" required>
            @if ($errors->has('NRO_RESOLUCION'))
                <div class="invalid-feedback">
                    {{ $errors->first('NRO_RESOLUCION') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="FECHA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Fecha:</label>
            <input type="text" class="form-control{{ $errors->has('FECHA') ? ' is-invalid' : '' }}" id="FECHA" name="FECHA" value="{{ old('FECHA') }}" placeholder="Ej: 1996-08-24" required>
            @if ($errors->has('FECHA'))
                <div class="invalid-feedback">
                    {{ $errors->first('FECHA') }}
                </div>
            @endif
        </div>
        

        <div class="mb-3">
            <label for="ID_CARGO" class="form-label"><i class="fa-solid fa-car-side"></i> Autoridad:</label>
            <select id="ID_CARGO" name="ID_CARGO" class="form-control @error('ID_CARGO') is-invalid @enderror" required>
                <option value="" selected>--Seleccione Autoridad--</option>

                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo['ID_CARGO'] }}">{{ $cargo['CARGO'] }}</option>
                @endforeach

            </select>

            @error('ID_CARGO')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="FUNCIONARIOS_DELEGADOS" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Funcionarios delegados:</label>
            <input type="text" class="form-control{{ $errors->has('FUNCIONARIOS_DELEGADOS') ? ' is-invalid' : '' }}" id="FUNCIONARIOS_DELEGADOS" name="FUNCIONARIOS_DELEGADOS" value="{{ old('FUNCIONARIOS_DELEGADOS') }}" placeholder="Ej: Jefes Unidad" >
            @if ($errors->has('FUNCIONARIOS_DELEGADOS'))
                <div class="invalid-feedback">
                    {{ $errors->first('FUNCIONARIOS_DELEGADOS') }}
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="MATERIA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Materia:</label>
            <input type="text" class="form-control{{ $errors->has('MATERIA') ? ' is-invalid' : '' }}" id="MATERIA" name="MATERIA" value="{{ old('MATERIA') }}" placeholder="Ej: Autorización máquinas registradoras Jefes Unidad" >
            @if ($errors->has('MATERIA'))
                <div class="invalid-feedback">
                    {{ $errors->first('MATERIA') }}
                </div>
            @endif
        </div>

        <a href="{{route('resolucion.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar resolución</button>
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

