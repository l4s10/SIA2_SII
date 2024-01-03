@extends('adminlte::page')

@section('title', 'Ingreso de Dirección Regional')

@section('content_header')
    <h1>Ingresar dirección regional</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('direccionregional.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="DIRECCION" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre de la dirección regional:</label>
            <input type="text" class="form-control{{ $errors->has('DIRECCION') ? ' is-invalid' : '' }}" id="DIRECCION" name="DIRECCION" value="{{ old('DIRECCION') }}" placeholder="Ej: DIRECCION REGIONAL DE ARICA" required>
            @if ($errors->has('DIRECCION'))
                <div class="invalid-feedback">
                    {{ $errors->first('DIRECCION') }}
                </div>
            @endif
        </div>
        <div class="mb-3 form-group">
            <label for="ID_REGION"><i class="fa-solid fa-book-bookmark"></i> Región asociada:</label>
            <select name="ID_REGION" id="ID_REGION" class="form-control @error('ID_REGION') is-invalid @enderror" required>
                <option value="" disabled selected>Selecciona una región</option>
                @foreach($regiones as $region)
                    <option value="{{ $region->ID_REGION }}" {{ old('ID_REGION') == $region->ID_REGION ? 'selected' : '' }}>{{ $region->REGION }}</option>
                @endforeach
            </select>
            @error('ID_REGION')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <a href="{{route('direccionregional.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
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

