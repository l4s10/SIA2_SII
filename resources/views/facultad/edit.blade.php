@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Facultad')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Facultad</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('facultades.update',$facultad->ID_FACULTAD)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                
                <div class="mb-3">
                    <label for="NRO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Número de Facultad:</label>
                    <input type="text" class="form-control{{ $errors->has('NRO') ? ' is-invalid' : '' }}" id="NRO" name="NRO" value="{{ $facultad->NRO }}" placeholder="Ej: 123" required>
                    @if ($errors->has('NRO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NRO') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="NOMBRE" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre:</label>
                    <input type="text" class="form-control{{ $errors->has('NOMBRE') ? ' is-invalid' : '' }}" id="NOMBRE" name="NOMBRE" value="{{ $facultad->NOMBRE }}" placeholder="Ej: APLICAR SANCIONES ADMINISTRATIVAS" required>
                    @if ($errors->has('NOMBRE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="CONTENIDO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Contenido:</label>
                    <textarea class="form-control{{ $errors->has('CONTENIDO') ? ' is-invalid' : '' }}" id="CONTENIDO" name="CONTENIDO" rows="4" required>{{ $facultad->CONTENIDO }}</textarea>
                    @if ($errors->has('CONTENIDO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('CONTENIDO') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="LEY_ASOCIADA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Ley asociada:</label>
                    <input type="text" class="form-control{{ $errors->has('LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="LEY_ASOCIADA" name="LEY_ASOCIADA" value="{{ $facultad->LEY_ASOCIADA }}" placeholder="Ej: Código Tributario" required>
                    @if ($errors->has('LEY_ASOCIADA'))
                        <div class="invalid-feedback">
                            {{ $errors->first('LEY_ASOCIADA') }}
                        </div>
                    @endif
                </div>
        
                <div class="mb-3">
                    <label for="ART_LEY_ASOCIADA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Art. de ley asociada:</label>
                    <input type="text" class="form-control{{ $errors->has('ART_LEY_ASOCIADA') ? ' is-invalid' : '' }}" id="ART_LEY_ASOCIADA" name="ART_LEY_ASOCIADA" value="{{ $facultad->ART_LEY_ASOCIADA }}" placeholder="Ej: 165" required>
                    @if ($errors->has('ART_LEY_ASOCIADA'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ART_LEY_ASOCIADA') }}
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="REFERENCIA_LEGAL" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Referencia Legal:</label>
                    <textarea class="form-control{{ $errors->has('REFERENCIA_LEGAL') ? ' is-invalid' : '' }}" id="REFERENCIA_LEGAL" name="REFERENCIA_LEGAL" rows="4" required>{{ $facultad->REFERENCIA_LEGAL }}</textarea>
                    @if ($errors->has('REFERENCIA_LEGAL'))
                        <div class="invalid-feedback">
                            {{ $errors->first('REFERENCIA_LEGAL') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="form-group">
            <a href="{{route('facultades.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
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
