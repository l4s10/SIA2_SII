@extends('adminlte::page')

@section('title', 'Ingreso de resolución delegatoria')

@section('content_header')
    <h1>Ingresar Póliza</h1>
@stop


@section('content')
<div class="container">
    <form action="{{ route('polizas.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NRO_POLIZA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> N° Poliza:</label>
            <input type="text" class="form-control{{ $errors->has('NRO_POLIZA') ? ' is-invalid' : '' }}" id="NRO_POLIZA" name="NRO_POLIZA" value="{{ old('NRO_POLIZA') }}" placeholder="Ej: 76206" required>
            @if ($errors->has('NRO_POLIZA'))
                <div class="invalid-feedback">
                    {{ $errors->first('NRO_POLIZA') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ID" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Funcionario:</label>
            <select class="form-control{{ $errors->has('ID') ? ' is-invalid' : '' }}" id="ID" name="ID" required>
                <option value="" selected disabled>Seleccionar Funcionario</option>
                @foreach($users->groupBy(function ($user) {
                    return $user->ubicacion->UBICACION;
                }) as $ubicacion => $usuarios)
                    <optgroup label="Ubicación: {{ $ubicacion }}">
                        @foreach($usuarios as $user)
                            <option value="{{ $user->id }}">{{ $user->NOMBRES }} {{ $user->APELLIDOS }}</option>
                        @endforeach
                    </optgroup>
                @endforeach
            </select>
            @if ($errors->has('ID'))
                <div class="invalid-feedback">
                    {{ $errors->first('ID') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="FECHA_VENCIMIENTO_LICENCIA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Fecha:</label>
            <input type="text" class="form-control{{ $errors->has('FECHA_VENCIMIENTO_LICENCIA') ? ' is-invalid' : '' }}" id="FECHA_VENCIMIENTO_LICENCIA" name="FECHA_VENCIMIENTO_LICENCIA" value="{{ old('FECHA_VENCIMIENTO_LICENCIA') }}" placeholder="Ej: 2024-08-24" required>
            @if ($errors->has('FECHA_VENCIMIENTO_LICENCIA'))
                <div class="invalid-feedback">
                    {{ $errors->first('FECHA_VENCIMIENTO_LICENCIA') }}
                </div>
            @endif
        </div>

        <a href="{{route('polizas.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar póliza</button>
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
