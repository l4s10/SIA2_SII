@extends('adminlte::page')

@section('title', 'Editar vehículo')

@section('content_header')
    <h1>Editar vehículo</h1>
    <br>
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
                <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-credit-card"></i> Patente</label>
<<<<<<< HEAD
                <input id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" type="text" class="form-control" tabindex="1" placeholder="Ej: AB12-34" value="{{ $vehiculo->PATENTE_VEHICULO }}" oninput="this.value = this.value.toUpperCase()" required>
                @error('PATENTE_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="ID_TIPO_VEH" class="form-label"><i class="fa-solid fa-circle-info"></i> Tipo</label>
                <select name="ID_TIPO_VEH" id="ID_TIPO_VEH" class="form-control" required>
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
        <br>
        <div class="row">
            <div class="col">
                <label for="MARCA" class="form-label"><i class="fa-solid fa-circle-info"></i> Marca</label>
<<<<<<< HEAD
                <input id="MARCA" name="MARCA" type="text" class="form-control" tabindex="3" placeholder="Toyota" value="{{ $vehiculo->MARCA }}" oninput="this.value = this.value.toUpperCase()" required>
                @error('MARCA')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="MODELO_VEHICULO" class="form-label"><i class="fa-solid fa-circle-info"></i> Modelo</label>
<<<<<<< HEAD
                <input id="MODELO_VEHICULO" name="MODELO_VEHICULO" type="text" class="form-control" tabindex="4" placeholder="Corolla" value="{{ $vehiculo->MODELO_VEHICULO }}" oninput="this.value = this.value.toUpperCase()" required>
                @error('MODELO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="ANO_VEHICULO" class="form-label"><i class="fa-regular fa-calendar-days"></i> Año</label>
                <input type="number" min="2010" step="1" id="ANO_VEHICULO" name="ANO_VEHICULO" placeholder="(2018)" required class="form-control" value="{{ $vehiculo->ANO_VEHICULO }}" />
>>>>>>> origin/Ricardo3
                @error('ANO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-4">
                <label for=""><i class="fa-solid fa-map-location-dot"></i> Región:</label>
                <select id="region-select" class="form-control" name="ID_REGION" required>
                    <option>Selecciona una región</option>
                    @foreach ($regiones as $region)
                        <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <label for=""><i class="fa-solid fa-location-dot"></i> Jurisdicción: </label>
                <select id="direccion-select" class="form-control" name="ID_DIRECCION" required>
                    <option>Selecciona una dirección regional</option>
                </select>
            </div>

            <div class="col-md-4">
                <label for=""><i class="fa-solid fa-street-view"></i> Ubicación/Departamento</label>
                <select id="ubicacion-select" class="form-control" name="ID_UBICACION" required>
                    <option>Selecciona una ubicación</option>
                    @foreach ($ubicaciones as $ubicacion)
                        @if ($ubicacion->ID_UBICACION == $vehiculo->ID_UBICACION)
                            <option value="{{$ubicacion->ID_UBICACION}}" selected>{{$ubicacion->UBICACION}}</option>
                        @endif
                    @endforeach
                </select>
            </div>
        </div>
        <br>
        <div class="mb-3">
            <label for="ESTADO_VEHICULO" class="form-label"><i class="fa-solid fa-square-check"></i> Estado</label>
            <select name="ESTADO_VEHICULO" id="ESTADO_VEHICULO" class="form-control" required>
                <option value="">-- SELECCIONE UN ESTADO --</option>
                <option value="DISPONIBLE" {{ $vehiculo->ESTADO_VEHICULO == 'DISPONIBLE' ? 'selected' : '' }}>DISPONIBLE</option>
                <option value="OCUPADO" {{ $vehiculo->ESTADO_VEHICULO == 'OCUPADO' ? 'selected' : '' }}>OCUPADO</option>
            </select>
            @error('ESTADO_VEHICULO')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <br>
        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop


@section('js')
{{-- filtros de region, direccion regional y ubicacion --}}
<script type="text/javascript">
    $(document).ready(function() {
        $('#region-select').on('change', function() {

            var regionId = $(this).val();

            // Limpia los selectores de direcciones regionales y ubicaciones
            $('#direccion-select').empty();
            $('#direccion-select').append('<option>Selecciona una dirección regional</option>'); // Agrega nuevamente la opción predeterminada

            $('#ubicacion-select').empty();
            $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

            if(regionId) {
                $.ajax({
                    url: '/get-direcciones/'+regionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#direccion-select').append('<option value="'+ value.ID_DIRECCION +'">'+ value.DIRECCION +'</option>');
                        });
                    }
                });
            }
        });


        $('#direccion-select').on('change', function() {
            var direccionId = $(this).val();

            // Limpia el selector de ubicaciones
            $('#ubicacion-select').empty();
            $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

            if(direccionId) {
                $.ajax({
                    url: '/get-ubicaciones/'+direccionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#ubicacion-select').append('<option value="'+ value.ID_UBICACION +'">'+ value.UBICACION +'</option>');
                        });
                    }
                });
            }
        });

        let year = new Date().getFullYear();
        document.getElementById('ANO_VEHICULO').setAttribute('max', year);
    });
</script>
@stop
