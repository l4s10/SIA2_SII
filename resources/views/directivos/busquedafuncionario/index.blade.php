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
            <div id="resultados-busqueda"></div>

            <div id="mensaje-error"></div>



            <div class="row g-3">
                <div class="col">
                    <label for="NOMBRE_COMPLETO" class="form-label"><i class="fa-solid fa-user"></i>Funcionario(a) en búsqueda:</label>
                    <input type="text" class="form-control" id="NOMBRE_COMPLETO" name="NOMBRE_COMPLETO" value="{{ old('NOMBRE_COMPLETO', $nombres.' '.$apellidos) }}" readonly>
                </div>
                <div class="col">
                    <label for="CARGO_FUNCIONARIO" class="form-label"><i class="fa-solid fa-user"></i> Cargo asociado:</label>
                    <input type="text" class="form-control" id="CARGO_FUNCIONARIO" name="CARGO_FUNCIONARIO" value="{{ old('CARGO_FUNCIONARIO', $cargoFuncionario ?? '') }}" readonly>                
                </div>

            </div>

            <div class="row g-3">
                <div class="col">
                    <label for="ID_DELEGADO" class="form-label"><i class="fa-solid fa-bookmark"></i> Autoridad:</label>
                    <select id="ID_DELEGADO" name="ID_DELEGADO" class="form-control @error('ID_DELEGADO') is-invalid @enderror">
                        <option value="" selected>--Seleccione Cargo Delegado--</option>
                        @foreach ($cargos as $cargo)
                            <option value="{{ $cargo->ID_CARGO }}">{{ $cargo->CARGO }}</option>
                        @endforeach
                    </select>
                    @error('ID_DELEGADO')
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
                            <th scope="col">Tipo Resolucion</th>
                            <th scope="col">Firmante</th>
                            <th scope="col">Delegado</th>
                            <th scope="col">Facultad</th>
                            <th scope="col">Glosa</th>
                            <th scope="col">Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($resoluciones as $resolucion)
                            <tr>
                                <td>{{ $resolucion->NRO_RESOLUCION }}</td>
                                <td>{{ date('d/m/Y', strtotime($resolucion->FECHA)) }}</td>
                                <td>{{ $resolucion->tipo->NOMBRE }}</td>
                                <td>{{ $resolucion->firmante->CARGO }}</td>
                                <td>{{ $resolucion->delegado->CARGO }}</td>
                                <td>{{ $resolucion->facultad->NOMBRE }}</td>
                                <td>
                                    <span class="glosa-abreviada">{{ substr($resolucion->facultad->CONTENIDO, 0, 0) }}</span>
                                    <button class="btn btn-sia-primary btn-block btn-expand" data-glosa="{{ $resolucion->facultad->CONTENIDO }}">
                                        <i class="fa-solid fa-square-plus"></i>
                                    </button>
                                    <button class="btn btn-sia-primary btn-block btn-collapse" style="display: none;">
                                        <i class="fa-solid fa-square-minus"></i>
                                    </button>
                                    
                                    <span class="glosa-completa" style="display: none;">{{ $resolucion->facultad->CONTENIDO }}</span>
                                </td>
                                <td>
                                    <a href="" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-file-pdf"></i></a>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function () {
            var timeoutId; // Variable para almacenar el ID del temporizador

            // Agregar eventos de cambio en los campos de nombres y apellidos
            $('#NOMBRES, #APELLIDOS').on('input', function () {
                clearTimeout(timeoutId); // Limpiar el temporizador si existe uno

                // Establecer un nuevo temporizador para retrasar la búsqueda
                timeoutId = setTimeout(function () {
                    // Obtener los valores ingresados en los campos de nombres y apellidos
                    var nombres = $('#NOMBRES').val();
                    var apellidos = $('#APELLIDOS').val();

                    // Realizar la solicitud AJAX para obtener los funcionarios en tiempo real
                    $.ajax({
                        url: '/consultaAjax', //URL del endpoint de consulta en tiempo real
                        type: 'GET',
                        data: {
                            nombres: nombres,
                            apellidos: apellidos
                        },
                        success: function(response) {
                            var htmlResultados = generarHTMLResultados(response);
                            $("#resultados-busqueda").html(htmlResultados);
                        },
                        error: function(xhr, status, error) {
                            var mensajeError = "Se produjo un error: " + error;
                            $("#mensaje-error").text(mensajeError);
                        }   
                    });
                }, 500); // Esperar 500 ms después de la última entrada antes de realizar la búsqueda
            });

            function generarHTMLResultados(response) {
                var html = "<h2>Resultados de la búsqueda:</h2>";
                html += "<ul>";
                response.forEach(function(item) {
                    html += "<li>" + item.NOMBRES + " " + item.APELLIDOS + "</li>";
                });
                html += "</ul>";
                return html;
            }

            // Agregar evento de clic al botón de búsqueda por nombre
            $('#buscarPorDatos').on('click', function () {
                $('#ID_DELEGADO').val(''); // Limpiar valor del input de ID_CARGO
                $('#searchForm').submit(); // Enviar el formulario
            });

            // Agregar evento de clic al botón de búsqueda por cargo
            $('#buscarPorCargo').on('click', function () {
                $('#NOMBRES').val(''); // Limpiar valor del input de NOMBRES
                $('#APELLIDOS').val(''); // Limpiar valor del input de APELLIDOS
                $('#searchForm').submit(); // Enviar el formulario
                $('#tablaResoluciones').hide(); // Ocultar la tabla actual
                $('#tablaOtra').show(); // Mostrar la otra tabla
            });


            // Agrega evento de clic al botón de expansión
            $('.btn-expand').on('click', function () {
                var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                var glosaCompleta = $(this).siblings('.glosa-completa');
                var btnExpand = $(this);
                var btnCollapse = $(this).siblings('.btn-collapse');

                glosaAbreviada.hide();
                glosaCompleta.show();
                btnExpand.hide();
                btnCollapse.show();
                //$(this).hide();
            });

            // Agregar evento de clic al botón de colapso
            $('.btn-collapse').on('click', function () {
                    var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                    var glosaCompleta = $(this).siblings('.glosa-completa');
                    var btnExpand = $(this).siblings('.btn-expand');
                    var btnCollapse = $(this);

                    glosaAbreviada.show();
                    glosaCompleta.hide();
                    btnExpand.show();
                    btnCollapse.hide();
                });
            });
    </script>
@stop