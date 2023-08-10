@extends('adminlte::page')

@section('title', 'Ingreso de Materiales')

@section('content_header')
    <h1>Ingresar Material</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('materiales.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="NOMBRE_MATERIAL" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre del material:</label>
            <input type="text" class="form-control{{ $errors->has('NOMBRE_MATERIAL') ? ' is-invalid' : '' }}" id="NOMBRE_MATERIAL" name="NOMBRE_MATERIAL" value="{{ old('NOMBRE_MATERIAL') }}" placeholder="Ej: LAPIZ N°2" required>
            @if ($errors->has('NOMBRE_MATERIAL'))
                <div class="invalid-feedback">
                    {{ $errors->first('NOMBRE_MATERIAL') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ID_TIPO_MAT" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Tipo de material:</label>
            <select class="form-control{{ $errors->has('ID_TIPO_MAT') ? ' is-invalid' : '' }}" aria-label="Seleccione un tipo de material" id="ID_TIPO_MAT" name="ID_TIPO_MAT" required>
                <option value="">--Seleccione un tipo de material--</option>
                @foreach($tipos as $tipo)
                    <option value="{{ $tipo->ID_TIPO_MAT }}" {{ old('ID_TIPO_MAT') == $tipo->ID_TIPO_MAT ? 'selected' : '' }}>
                        {{ $tipo->TIPO_MATERIAL }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('ID_TIPO_MAT'))
                <div class="invalid-feedback">
                    {{ $errors->first('ID_TIPO_MAT') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="STOCK" class="form-label"><i class="fa-solid fa-person-shelter"></i> Stock:</label>
            <input type="number" class="form-control{{ $errors->has('STOCK') ? ' is-invalid' : '' }}" id="STOCK" name="STOCK" value="{{ old('STOCK') }}" placeholder="Ingrese la cantidad disponible del material" required>
            @if ($errors->has('STOCK'))
                <div class="invalid-feedback">
                    {{ $errors->first('STOCK') }}
                </div>
            @endif
        </div>

        <div class="mb-3">
            <label for="ID_DIRECCION" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Direccion Regional:</label>
            <select id="ID_DIRECCION" name="ID_DIRECCION" class="form-control" disabled>
                <option value="{{$direccionFiltradaId}}" selected>{{$direccionFiltradaNombre}}</option>
            </select>
            <input type="hidden" name="ID_DIRECCION" value="{{$direccionFiltradaId}}"> <!-- Esta línea asegura que el ID se envíe al servidor -->
        </div>

        <div class="mb-3">
            <div class="form-group">
                <label for="DETALLE_MOVIMIENTO">Detalle del Movimiento</label>
                <textarea class="form-control{{ $errors->has('DETALLE_MOVIMIENTO') ? ' is-invalid' : '' }}" name="DETALLE_MOVIMIENTO" id="DETALLE_MOVIMIENTO" cols="30" rows="5" placeholder="Recibido por x transportista con x numero de factura (MAX 1000 CARACTERES)">{{ old('DETALLE_MOVIMIENTO') }}</textarea>
                @if ($errors->has('DETALLE_MOVIMIENTO'))
                    <div class="invalid-feedback">
                        {{ $errors->first('DETALLE_MOVIMIENTO') }}
                    </div>
                @endif
            </div>
        </div>

        <a href="{{route('materiales.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar material</button>
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
