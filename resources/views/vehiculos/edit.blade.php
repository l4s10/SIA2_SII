@extends('adminlte::page')

@section('title', 'Editar vehículo')

@section('content_header')
    <h1>Editar vehículo</h1>
@stop

@section('content')
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @endif

    <form action="{{ route('vehiculos.update', $vehiculo->ID_VEHICULO) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <label for="PATENTE_VEHICULO" class="form-label">Patente</label>
                <input id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" type="text" class="form-control" tabindex="1" placeholder="Ej: AB1234" value="{{ $vehiculo->PATENTE_VEHICULO }}">
                @error('PATENTE_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="ID_TIPO_VEH" class="form-label">Tipo</label>
                <select name="ID_TIPO_VEH" id="ID_TIPO_VEH" class="form-control">
                    <option value="">-- SELECCIONE UN TIPO DE VEHÍCULO --</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{ $tipo->ID_TIPO_VEH }}" {{ $tipo->ID_TIPO_VEH == $vehiculo->ID_TIPO_VEH ? 'selected' : '' }}>{{ $tipo->TIPO_VEHICULO }}</option>
                    @endforeach
                </select>
                @error('ID_TIPO_VEH')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="MARCA" class="form-label">Marca</label>
                <input id="MARCA" name="MARCA" type="text" class="form-control" tabindex="3" placeholder="Toyota" value="{{ $vehiculo->MARCA }}">
                @error('MARCA')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="MODELO_VEHICULO" class="form-label">Modelo</label>
                <input id="MODELO_VEHICULO" name="MODELO_VEHICULO" type="text" class="form-control" tabindex="4" placeholder="Corolla" value="{{ $vehiculo->MODELO_VEHICULO }}">
                @error('MODELO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ANO_VEHICULO" class="form-label">Año</label>
                <input type="number" min="1900" max="2099" step="1" id="ANO_VEHICULO" name="ANO_VEHICULO" placeholder="(1900 - 2099)" class="form-control" value="{{ $vehiculo->ANO_VEHICULO }}" />
                @error('ANO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="ID_UBICACION" class="form-label">Ubicación</label>
                <select name="ID_UBICACION" id="ID_UBICACION" class="form-control">
                    <option value="">-- SELECCIONE UNA UBICACIÓN --</option>
                    @foreach ($ubicaciones as $ubicacion)
                        <option value="{{ $ubicacion->ID_UBICACION }}" {{ $ubicacion->ID_UBICACION == $vehiculo->ID_UBICACION ? 'selected' : '' }}>{{ $ubicacion->UBICACION }}</option>
                    @endforeach
                </select>
                @error('ID_UBICACION')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="mb-3">
            <label for="ESTADO_VEHICULO" class="form-label">Estado</label>
            <select name="ESTADO_VEHICULO" id="ESTADO_VEHICULO" class="form-control">
                <option value="">-- SELECCIONE UN ESTADO --</option>
                <option value="DISPONIBLE" {{ $vehiculo->ESTADO_VEHICULO == 'DISPONIBLE' ? 'selected' : '' }}>DISPONIBLE</option>
                <option value="OCUPADO" {{ $vehiculo->ESTADO_VEHICULO == 'OCUPADO' ? 'selected' : '' }}>OCUPADO</option>
            </select>
            @error('ESTADO_VEHICULO')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
