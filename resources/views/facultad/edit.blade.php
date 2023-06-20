@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Facultad')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Region</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('facultades.update',$facultad->ID_FACULTAD)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">

                <div class="mb-3">
                    <label for="NOMBRE" class="form-label">Nombre:</label>
                    <input type="text" class="form-control{{ $errors->has('NOMBRE') ? ' is-invalid' : '' }}" id="NOMBRE" name="NOMBRE" value="{{ $facultad->NOMBRE }}" placeholder="Ej: APLICAR SANCIONES ADMINISTRATIVAS" required>
                    @if ($errors->has('NOMBRE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="CONTENIDO" class="form-label">Contenido:</label>
                    <input type="text" class="form-control{{ $errors->has('CONTENIDO') ? ' is-invalid' : '' }}" id="CONTENIDO" name="CONTENIDO" value="{{ $facultad->CONTENIDO }}" placeholder="Ej: La facultad de aplicar las sanciones..." required>
                    @if ($errors->has('CONTENIDO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('CONTENIDO') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="LEY_ASOCIADA" class="form-label">Ley asociada:</label>
                    <input type="text" class="form-control{{ $errors->has('LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="LEY_ASOCIADA" name="LEY_ASOCIADA" value="{{ $facultad->LEY_ASOCIADA }}" placeholder="Ej: Código Tributario" required>
                    @if ($errors->has('LEY_ASOCIADA'))
                        <div class="invalid-feedback">
                            {{ $errors->first('LEY_ASOCIADA') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="ART_LEY_ASOCIADA" class="form-label">Art. de ley asociada:</label>
                    <input type="text" class="form-control{{ $errors->has('ART_LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="ART_LEY_ASOCIADA" name="ART_LEY_ASOCIADA" value="{{ $facultad->ART_LEY_ASOCIADA }}" placeholder="Ej: 165" required>
                    @if ($errors->has('ART_LEY_ASOCIADA'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ART_LEY_ASOCIADA') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <a href="{{route('facultades.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Modificar facultad</button>
        </div>
    </form>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
@endsection
