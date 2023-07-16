@extends('adminlte::page')

@section('title', 'Ingreso de resolución delegatoria')

@section('content_header')
    <h1>Ingresar Resolución Delegatoria</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('resolucion.store') }}" method="POST" enctype="multipart/form-data">        @csrf
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
            <label for="ID_TIPO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Tipo de Resolución:</label>
            <select id="ID_TIPO" name="ID_TIPO" class="form-control @error('ID_TIPO') is-invalid @enderror" required>
                <option value="" selected>--Seleccione Tipo de Resolución--</option>

                @foreach ($tiposResolucion as $idTipoResolucion => $nombreTipoResolucion)
                    <option value="{{ $idTipoResolucion }}">{{ $nombreTipoResolucion }}</option>
                @endforeach

            </select>

            @error('ID_TIPO')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="ID_FIRMANTE" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Firmante:</label>
            <select id="ID_FIRMANTE" name="ID_FIRMANTE" class="form-control @error('ID_FIRMANTE') is-invalid @enderror" required>
                <option value="" selected>--Seleccione Firmante--</option>

                @foreach ($firmantes as $idFirmante => $nombreFirmante)
                    <option value="{{ $idFirmante }}">{{ $nombreFirmante }}</option>
                @endforeach

            </select>

            @error('ID_FIRMANTE')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="ID_FACULTAD" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Facultad:</label>
            <select id="ID_FACULTAD" name="ID_FACULTAD" class="form-control @error('ID_FACULTAD') is-invalid @enderror" required>
                <option value="" selected>--Seleccione Facultad--</option>

                @foreach ($facultades as $idFacultad => $nombreFacultad)
                    <option value="{{ $idFacultad }}">{{ $nombreFacultad }}</option>
                @endforeach

            </select>

            @error('ID_FACULTAD')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ID_DELEGADO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Delegado:</label>
            <select id="ID_DELEGADO" name="ID_DELEGADO" class="form-control @error('ID_DELEGADO') is-invalid @enderror" required>
                <option value="" selected>--Seleccione Delegado--</option>

                @foreach ($delegados as $idDelegado => $nombreDelegado)
                    <option value="{{ $idDelegado }}">{{ $nombreDelegado }}</option>
                @endforeach

            </select>

            @error('ID_DELEGADO')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="DOCUMENTO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Documento:</label>
            <input type="file" name="DOCUMENTO" id="DOCUMENTO" class="form-control{{ $errors->has('DOCUMENTO') ? ' is-invalid' : '' }}">
            @error('DOCUMENTO')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <a href="{{ route('resolucion.index') }}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar resolución</button>
    </form>
</div>
@stop


@section('css')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            $('#FECHA').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
        });
    </script>
@stop
