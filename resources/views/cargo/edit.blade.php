@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Cargo')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Cargo</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('cargos.update',$cargo->ID_CARGO)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="CARGO">Nombre cargo:</label>
                    <input type="text" name="CARGO" id="CARGO" class="form-control" placeholder="Nombre del cargo" value="{{ $cargo->CARGO }}" required autofocus>

                    @error('CARGO')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- OPCION QUE PERMITE SELECCIONAR DIRECCION REGIONAL --}}
        <div class="mb-3" class="form-group">
            <label for="ID_DIRECCION"><i class="fa-solid fa-book-bookmark"></i> Direccion Regional asociada:</label>
            <select name="ID_DIRECCION" id="ID_DIRECCION" class="form-control">
                @foreach($direccion as $idDireccion => $direccion)
                    <option value="{{ $idDireccion }}">{{ $direccion }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <a href="{{route('cargos.index')}}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Modificar cargo</button>
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
