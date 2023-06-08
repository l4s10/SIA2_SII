@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Resolución Delegatoria')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Resolución Delegatoria</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('resolucion.update',$resolucion->ID_RESOLUCION)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <p>ID_RESOLUCION: {{$resolucion->ID_RESOLUCION}}</p>
                        <label for="NRO_RESOLUCION">N° Resolución:</label>
                        <input type="text" name="NRO_RESOLUCION" id="NRO_RESOLUCION" class="form-control" placeholder="N° Resolución (Ej: 1234)" value="{{ $resolucion->NRO_RESOLUCION }}" required autofocus>
                        @error('NRO_RESOLUCION')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    @php
                        // Imprimir el valor del ID_RESOLUCION
                        echo "ID_RESOLUCION: " . $resolucion->ID_RESOLUCION;
                    @endphp
                    
                    <div class="form-group">
                        <label for="FECHA">Fecha:</label>
                        <input type="text" name="FECHA" id="FECHA" class="form-control" placeholder="Fecha: (Ej 1996-24-08) " value="{{ date('Y-m-d', strtotime($resolucion->FECHA)) }}" required autofocus>
                        @error('FECHA')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="AUTORIDAD">Autoridad:</label>
                        <input type="text" name="AUTORIDAD" id="AUTORIDAD" class="form-control" placeholder="Cargo directivo: (Ej: Director Regional )" value="{{ $resolucion->AUTORIDAD }}" required autofocus>
                        @error('AUTORIDAD')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="FUNCIONARIOS_DELEGADOS">Funcionarios delegados:</label>
                        <input type="text" name="FUNCIONARIOS_DELEGADOS" id="FUNCIONARIOS_DELEGADOS" class="form-control" placeholder="Cargo funcionario delegado: (Ej: Jefe Depto Avaluaciones)" value="{{ $resolucion->FUNCIONARIOS_DELEGADOS }}" autofocus>
                        @error('FUNCIONARIOS_DELEGADOS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="MATERIA">Materia asociada:</label>
                        <input type="text" name="MATERIA" id="MATERIA" class="form-control" placeholder="Materia asociada: (Ej: Autorización máquinas registradoras Jefes Unidad)" value="{{ $resolucion->MATERIA }}" autofocus>
                        @error('MATERIA')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <a href="{{route('resolucion.index')}}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Modificar resolución</button>
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
