@extends('adminlte::page')

@section('title', 'Ingresar Vehiculo')

@section('content_header')
    <h1>Ingresar vehículo</h1>
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
    <form action="{{route('vehiculos.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col">
                <label for="PATENTE_VEHICULO" class="form-label">Patente</label>
                <input id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" type="text" class="form-control" tabindex="1" placeholder="Ej: AB1234">
                @error('PATENTE_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="ID_TIPO_VEH" class="form-label">Tipo</label>
                <select name="ID_TIPO_VEH" id="ID_TIPO_VEH" class="form-control">
                    <option value="">-- SELECCIONE UN TIPO DE VEHÍCULO --</option>
                    @foreach ($tipos as $tipo)
                        <option value="{{$tipo->ID_TIPO_VEH}}">{{ $tipo->TIPO_VEHICULO}}</option>
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
                <input id="MARCA" name="MARCA" type="text" class="form-control" tabindex="3" placeholder="Toyota">
                @error('MARCA')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="MODELO_VEHICULO" class="form-label">Modelo</label>
                <input id="MODELO_VEHICULO" name="MODELO_VEHICULO" type="text" class="form-control" tabindex="4" placeholder="Corolla">
                @error('MODELO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row">
            <div class="col">
                <label for="ANO_VEHICULO" class="form-label">Año</label>
                <input type="number" min="1900" max="2099" step="1" id="ANO_VEHICULO" name="ANO_VEHICULO" placeholder="(1900 - 2099)" class="form-control"/>
                @error('ANO_VEHICULO')
                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                @enderror
            </div>
        </div>
        {{-- !!REGION Y DIRECCION REGIONAL --}}
        <div class="row">
            <div class="col">
                {{-- Region field --}}
                <div class="form-group">
                    <label for="region">Región</label>
                    <select name="ID_REGION" class="form-control @error('ID_REGION') is-invalid @enderror" required>
                        <option value="" disabled>Seleccione una región</option>
                        @foreach ($regiones as $region)
                            <option value="{{ $region->ID_REGION }}" {{ old('ID_REGION') == $region->ID_REGION ? 'selected' : '' }}>{{ $region->REGION }}</option>
                        @endforeach
                    </select>

                    @error('ID_REGION')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Direccion field --}}
                <div class="form-group">
                    <label for="direccion">Jurisdicción</label>
                    <select name="ID_DIRECCION" class="form-control @error('ID_DIRECCION') is-invalid @enderror" required>
                        <option value="" disabled>Seleccione una dirección</option>
                    </select>

                    @error('ID_DIRECCION')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        {{-- !!DEPARTAMENTO Y UBICACION --}}
        <div class="row">
            <div class="col-md-6">
                {{-- Departamento --}}
                <label for="entidad_type">Seleccione relación</label>
                <select name="entidad_type" id="entidad_type" class="form-control">
                    <option value="Departamento">Departamento</option>
                    <option value="Ubicacion">Unidad</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="entidad_id" id="entidad_id_label">Seleccione (depto o unidad)</label>
                <select name="entidad_id" id="entidad_id" class="form-control">
                    <option value="">-- Seleccione --</option>
                </select>
            </div>
        </div>
        <div class="mb-3">
            <label for="ESTADO_VEHICULO" class="form-label">Estado</label>
            <select name="ESTADO_VEHICULO" id="ESTADO_VEHICULO" class="form-control">
                <option value="">-- SELECCIONE UN ESTADO --</option>
                <option value="DISPONIBLE">DISPONIBLE</option>
                <option value="OCUPADO">OCUPADO</option>
            </select>
            @error('ESTADO_VEHICULO')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>

        <a href="{{route('vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
{{-- !!SCRIPT DE FILTROS (SE OBTENDRA DIRECCION REGIONAL SEGUN LA REGION SELECCIONADA) --}}
<script>
    $(document).ready(function () {
        // Configuración de Flatpickr para las fechas
        var flatpickrConfig = {
            locale: 'es',
            minDate: "1950-01-01",
            dateFormat: "Y-m-d",
            altFormat: "d-m-Y",
            altInput: true,
            allowInput: true,
        };

        // Inicializar Flatpickr en los campos de fecha
        $('#FECHA_NAC').flatpickr(flatpickrConfig);
        $('#FECHA_INGRESO').flatpickr(flatpickrConfig);

        var regionSelect = $('select[name="ID_REGION"]');
        var direccionSelect = $('select[name="ID_DIRECCION"]');
        var direcciones = @json($direcciones);
        var entidadTypeSelect = $('select[name="entidad_type"]');
        var entidadIdSelect = $('select[name="entidad_id"]');
        var ubicaciones = @json($ubicaciones);
        var departamentos = @json($departamentos);

        function filtrarDirecciones() {
            var regionId = regionSelect.val();
            var direccionesFiltradas = direcciones.filter(function (direccion) {
                return direccion.ID_REGION == regionId;
            });

            direccionSelect.empty();
            direccionesFiltradas.forEach(function (direccion) {
                direccionSelect.append('<option value="' + direccion.ID_DIRECCION + '">' + direccion.DIRECCION + '</option>');
            });

            // Actualizar las opciones de entidad_id basado en el tipo de entidad actualmente seleccionado
            actualizarEntidades();
        }

        function actualizarEntidades() {
            entidadIdSelect.empty();
            entidadIdSelect.append('<option value="">-- Seleccione una opción --</option>');

            var entidadType = entidadTypeSelect.val();

            if (entidadType === 'Departamento') {
                departamentos.forEach(function (departamento) {
                    entidadIdSelect.append('<option value="' + departamento.ID_DEPARTAMENTO + '">' + departamento.DEPARTAMENTO + '</option>');
                });
            } else if (entidadType === 'Ubicacion') {
                var direccionId = direccionSelect.val();
                var ubicacionesFiltradas = ubicaciones.filter(function (ubicacion) {
                    return ubicacion.ID_DIRECCION == direccionId;
                });

                ubicacionesFiltradas.forEach(function (ubicacion) {
                    entidadIdSelect.append('<option value="' + ubicacion.ID_UBICACION + '">' + ubicacion.UBICACION + '</option>');
                });
            }

            // Cambiar el texto del label de entidad_id basado en la selección actual de entidad_type
            if (entidadType === 'Departamento') {
                $('#entidad_id_label').text('Seleccione Departamento');
            } else if (entidadType === 'Ubicacion') {
                $('#entidad_id_label').text('Seleccione Unidad');
            }
        }

        regionSelect.on('change', filtrarDirecciones);
        direccionSelect.on('change', actualizarEntidades);
        entidadTypeSelect.on('change', actualizarEntidades);

        filtrarDirecciones();
    });
</script>
@stop
