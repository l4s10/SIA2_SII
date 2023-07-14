@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Póliza')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Póliza</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('polizas.update',$poliza->ID_POLIZA)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="NRO_POLIZA">N° Póliza:</label>
                        <input type="text" name="NRO_POLIZA" id="NRO_POLIZA" class="form-control" placeholder="N° Póliza (Ej: 76206)" value="{{ $poliza->NRO_POLIZA }}" required autofocus>
                        @error('NRO_POLIZA')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="ID">Conductor:</label>
                        <select name="ID" id="ID" class="form-control" required>
                            <option value="" disabled>Seleccionar Conductor</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" @if($user->id == $poliza->ID) selected @endif>{{ $user->NOMBRES }} {{ $user->APELLIDOS }}</option>
                            @endforeach
                        </select>
                        @error('ID')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="FECHA_VENCIMIENTO_LICENCIA">Vencimiento licencia de conducir:</label>
                        <input type="text" name="FECHA_VENCIMIENTO_LICENCIA" id="FECHA_VENCIMIENTO_LICENCIA" class="form-control" placeholder="Fecha: (Ej 2024-24-08) " value="{{ date('d-m-Y', strtotime($poliza->FECHA_VENCIMIENTO_LICENCIA)) }}" required autofocus>
                        @error('FECHA_VENCIMIENTO_LICENCIA')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="{{route('polizas.index')}}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Modificar póliza</button>
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
    <script>
        $(function () {
            $('#fecha_nacimiento').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
            $('#fecha_ingreso').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
            $('#fecha_asim_planta').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
        });
    </script>
@endsection
