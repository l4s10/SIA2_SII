@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Ubicación o Dpto')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Ubicación o Departamento</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('ubicacion.update',$ubicacion->ID_UBICACION)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="UBICACION"><i class="fa-solid fa-book-bookmark"></i> Nombre:</label>
                    <input type="text" name="UBICACION" id="UBICACION" class="form-control" placeholder="Ej: DEPARTAMENTO DE ADMINISTRACION / UNIDAD DE CONCEPCIÓN" value="{{ $ubicacion->UBICACION }}" required autofocus>

                    @error('UBICACION')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- OPCION QUE PERMITE SELECCIONAR DIRECCION REGIONAL (PARA REGION METROPOLITANA) --}}
        <div class="mb-3 form-group">
            <label for="ID_DIRECCION"><i class="fa-solid fa-book-bookmark"></i> Dirección Regional asociada:</label>
            <select name="ID_DIRECCION" id="ID_DIRECCION" class="form-control">
                <option value="{{ $direccionRegional->ID_DIRECCION }}">{{ $direccionRegional->DIRECCION }}</option>
            </select>
        </div>
        
        <div class="form-group">
            <a href="{{route('ubicacion.index')}}" class="btn btn-secondary">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar cambios</button>
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
