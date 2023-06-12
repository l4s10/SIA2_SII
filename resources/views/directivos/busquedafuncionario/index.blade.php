@extends('adminlte::page')

@section('title', 'busqueda de resoluciones')

@section('content_header')
    <h1>Información sobre resoluciones de directivos</h1>
@stop

@section('content')
    <div class="container">
        <form id="searchForm" action="{{ route('busquedafuncionario.index') }}" method="GET">
            @csrf
            <div class="row g-3">
                <input type="text" name="id" value="{{ auth()->user()->id }}" hidden>

                <div class="col">
                    <label for="NOMBRES" class="form-label"><i class="fa-solid fa-user"></i>Nombres:</label>
                    <input type="string" class="form-control" id="NOMBRES" name="NOMBRES" value="{{ old('NOMBRES') }}">
                    @error('NOMBRES')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col">
                    <label for="APELLIDOS" class="form-label"><i class="fa-solid fa-user"></i>Apellidos:</label>
                    <input type="string" class="form-control" id="APELLIDOS" name="APELLIDOS" value="{{ old('APELLIDOS') }}">
                    @error('APELLIDOS')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="button" id="buscarPorDatos" class="btn btn-primary">Buscar por Datos</button>

            <div class="row g-3">
                <div class="col">
                    <label for="ID_CARGO" class="form-label"><i class="fa-solid fa-bookmark"></i> Autoridad:</label>
                    <select id="ID_CARGO" name="ID_CARGO" class="form-control @error('ID_CARGO') is-invalid @enderror">
                        <option value="" selected>--Seleccione Autoridad--</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo['ID_CARGO'] }}">{{ $cargo['CARGO'] }}</option>
                        @endforeach
                    </select>
                    @error('ID_CARGO')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="button" id="buscarPorCargo" class="btn btn-primary">Buscar por Cargo</button>
        </form>

        @if(count($resoluciones) > 0)
            <div class="table-responsive">
                <table id="resoluciones" class="table table-bordered mt-4 custom-table">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Resolución</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Autoridad</th>
                            <th scope="col">Funcionario(s) Delegado(s)</th>
                            <th scope="col">Materia</th>
                            <th scope="col">Documento</th>
                            <th scope="col">Administrar</th>
                        </tr>
                    </thead>
    
                    <tbody>
                        @foreach($resoluciones as $resolucion)
                            <tr>
                                <td>{{ $resolucion->NRO_RESOLUCION }}</td>
                                <td>{{ date('d/m/Y', strtotime($resolucion->FECHA)) }}</td>
                                <td>{{ $resolucion->cargo->CARGO }}</td>
                                <td>{{ $resolucion->FUNCIONARIOS_DELEGADOS }}</td>
                                <td>{{ $resolucion->MATERIA }}</td>
                                <td>
                                    <a href="" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-file-pdf"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('resolucion.show', $resolucion->ID_RESOLUCION) }}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">No se encontraron resoluciones.</div>
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-TDt7dKgGsPvwsSTcc2CC7SE2/w7Px6CoaGh7fFA13iP8/wx4NSJ8G4PkiUmcnqC4E6F3jTQFJOU2gUTr0lXG2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .textarea-container {
            margin-top: 10px; /* Ajusta el valor según sea necesario */
        }
    </style>
        <style>
        .alert {
        opacity: 0.7; 
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>

    
@stop

@section('js')
    <!-- Incluir archivos JS flatpicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            // Agregar evento de clic al botón de búsqueda por nombre
            $('#buscarPorDatos').on('click', function () {
                $('#ID_CARGO').val(''); // Limpiar valor del input de ID_CARGO
                $('#searchForm').submit(); // Enviar el formulario
            });

            // Agregar evento de clic al botón de búsqueda por cargo
            $('#buscarPorCargo').on('click', function () {
                $('#NOMBRES').val(''); // Limpiar valor del input de NOMBRES
                $('#APELLIDOS').val(''); // Limpiar valor del input de APELLIDOS
                $('#searchForm').submit(); // Enviar el formulario
            });
        });
    </script>
@stop