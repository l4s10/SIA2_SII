@extends('adminlte::page')

@section('title', 'busqueda de resoluciones')

@section('content_header')
    <h1>Búsqueda de Resoluciones Delegatorias de Facultades</h1>
@stop

@section('content')
    <div class="container">
        <form id="searchForm" action="{{ route('busquedafuncionario.index') }}" method="GET">
            @csrf
            <fieldset>
                <legend><i class="fa-solid fa-caret-right"></i> Resoluciones asociadas a un funcionario específico</legend>
                <div class="row g-3">
                    <input type="text" name="id" value="{{ auth()->user()->id }}" hidden>

                    <div class="col">
                        <label for="NOMBRES" class="form-label">Nombres:</label>
                        <input type="string" class="form-control" id="NOMBRES" name="NOMBRES" value="{{ old('NOMBRES') }}" placeholder="1er NOMBRE 2do NOMBRE">
                        @error('NOMBRES')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="APELLIDOS" class="form-label">Apellidos:</label>
                        <input type="string" class="form-control" id="APELLIDOS" name="APELLIDOS" value="{{ old('APELLIDOS') }}" placeholder="1er APELLIDO 2do APELLIDO">
                        @error('APELLIDOS')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col">
                        <label for="RUT" class="form-label">Rut:</label>
                        <input type="string" class="form-control" id="RUT" name="RUT" value="{{ old('RUT') }}" placeholder="12345678-9">
                        @error('RUT')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label for="ID_CARGO" class="form-label">Cargo:</label>
                        <div class="input-group">
                            <select id="ID_CARGO" name="ID_CARGO" class="form-control @error('ID_CARGO') is-invalid @enderror">
                                <option value="" selected>--Seleccione Cargo--</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->ID_CARGO }}">{{ $cargo->CARGO }}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('ID_CARGO')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <div  id="mensaje-error"></div>

            <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
            <div id="resultados-busqueda"></div>

            <fieldset>
                <legend><i class="fa-solid fa-caret-right"></i> Resoluciones asociadas a un cargo específico</legend>

                <div class="row g-3">
                    <div class="col d-flex flex-column align-items-start">
                        <label for="ID_DELEGADO" class="form-label">Autoridad:</label>
                        <div class="input-group custom-input-group">
                            <select id="ID_DELEGADO" name="ID_DELEGADO" class="w-50 custom-select @error('ID_DELEGADO') is-invalid @enderror">
                                <option value="" selected>--Seleccione Cargo Delegado--</option>
                                @foreach ($cargos as $cargo)
                                    <option value="{{ $cargo->ID_CARGO }}">{{ $cargo->CARGO }}</option>
                                @endforeach
                            </select>
                            <div class="input-group-append">
                                <button type="button" id="buscarPorCargo" class="btn btn-primary"><i class="fa-solid fa-magnifying-glass"></i></button>
                            </div>
                        </div>
                        @error('ID_DELEGADO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </fieldset>
        </form>

        <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
        @if($busquedaResolucionFuncionario||$busquedaResolucionFuncionarioFallida)
            <div class="row g-3">
                <div style="margin-top: 50px;"></div> <!-- Espacio entre las funcionalidades -->
                <legend><i class="fa-solid fa-caret-right"></i> Resultados de la búsqueda</legend>
                <div style="margin-top: 5px;"></div> <!-- Espacio entre las funcionalidades -->
                <div class="col">
                    <label for="NOMBRE_COMPLETO" class="form-label"><i class="fa-solid fa-user"></i> Funcionario(a):</label>
                    <input type="text" class="form-control" id="NOMBRE_COMPLETO" name="NOMBRE_COMPLETO" value="{{ old('NOMBRE_COMPLETO', $nombres.' '.$apellidos) }}" readonly>
                </div>
                <div class="col">
                    <label for="CARGO_FUNCIONARIO" class="form-label"><i class="fa-solid fa-bookmark"></i> Cargo asociado:</label>
                    <input type="text" class="form-control" id="CARGO_FUNCIONARIO" name="CARGO_FUNCIONARIO" value="{{ old('CARGO_FUNCIONARIO', $cargoFuncionario ?? '') }}" readonly>
                </div>
                <div class="col">
                    <label for="RUT" class="form-label"><i class="fa-solid fa-address-card"></i> Rut:</label>
                    <input type="text" class="form-control" id="RUT" name="RUT" value="{{ old('RUT', $rutRes ?? '') }}" readonly>
                </div>
            </div>
        @else
            @if($busquedaResolucionCargo||$busquedaResolucionCargoFallida)
                <div style="margin-top: 50px;"></div> <!-- Espacio entre las funcionalidades -->
                <legend><i class="fa-solid fa-caret-right"></i> Resultados de la búsqueda</legend>
                <div style="margin-top: 5px;"></div> <!-- Espacio entre las funcionalidades -->
                <div class="col-md-6 form-group">
                    <label for="CARGO_FUNCIONARIO" class="form-label"><i class="fa-solid fa-bookmark"></i> Cargo delegado:</label>
                    <div style="margin-top: 10px;"></div> <!-- Espacio entre las funcionalidades -->
                    <input type="text" class="form-control" id="CARGO_FUNCIONARIO" name="CARGO_FUNCIONARIO" value="{{ old('CARGO_FUNCIONARIO', $cargoResolucion ?? '') }}" readonly>
                </div>
            @endif
        @endif

        @if(count($resoluciones) > 0)
            <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
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
                            <th scope="col">Ley asociada</th>
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
                                <td>{{ $resolucion->facultad->LEY_ASOCIADA }}</td>
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
                                    @if ($resolucion->DOCUMENTO)
                                        <a href="{{ asset('storage/resoluciones/' . $resolucion->DOCUMENTO) }}" class="btn btn-sia-primary btn-block" target="_blank">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </a>
                                    @else
                                        Sin documento
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- Limpio 'session' para depurar el buffer y controlar de mensajes asociados al 'else' -->
            {{ session()->forget('busquedaAjax') }}
            {{ session()->forget('busquedaResolucionCargoFallida') }}
        @else
            @if((session('busquedaAjax')))
                <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
                <div class="alert alert-info">No se encontraron resoluciones para el funcionario seleccionado.</div>
                {{ session()->forget('busquedaAjax') }}
            @else
                @if($busquedaResolucionCargoFallida)
                    <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
                    <div class="alert alert-info">No se encontraron resoluciones para el cargo seleccionado.</div>
                    {{ session()->forget('busquedaResolucionCargoFallida') }}
                @else
                    <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
                    <div class="alert alert-info">Ingrese algún parámetro para obtener resoluciones</div>
                @endif
            @endif
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

        .alert {
            opacity: 0.7;
            background-color: #99CCFF;
            color:     #000000;
        }

        .custom-input-group {
            width: 50%; /* Ajusta el valor según sea necesario */
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
        $(function() {
            var timeoutId; // Variable para almacenar el ID del temporizador
            // Agrega eventos de cambio en los campos de nombres y apellidos
            $('#NOMBRES, #APELLIDOS, #RUT, #ID_CARGO').on('input', function() {
                clearTimeout(timeoutId); // Limpiar el temporizador si existe uno
                // Obtener los valores ingresados en los campos de nombres y apellidos
                var nombres = $('#NOMBRES').val();
                var apellidos = $('#APELLIDOS').val();
                var rut = $('#RUT').val();
                var idCargoFuncionario = $('#ID_CARGO').val();

                if (!nombres && !apellidos && !rut && !idCargoFuncionario) {
                    // Si todos los campos están vacíos, borrar la tabla de resultados
                    $("#resultados-busqueda").empty();
                } else {
                    // Establecer un nuevo temporizador para retrasar la búsqueda
                    timeoutId = setTimeout(function() {
                        // Realizar la solicitud AJAX para obtener los funcionarios en tiempo real
                        $.ajax({
                            url: '/consultaAjax', // URL del endpoint de consulta en tiempo real
                            type: 'GET',
                            data: {
                                nombres: nombres,
                                apellidos: apellidos,
                                rut: rut,
                                idCargoFuncionario: idCargoFuncionario
                            },
                            success: function(response) {
                                if (response.length > 0) {
                                    var htmlResultados = generarHTMLResultados(response);
                                    $("#resultados-busqueda").html(htmlResultados);
                                } else {
                                    $("#resultados-busqueda").html('<h4>No existen funcionarios para esos registros</h4>');
                                    $("#resultados-busqueda").append('<div style="margin-top: 60px;"></div>');
                                }
                            },
                            error: function(xhr, status, error) {
                                var mensajeError = "Se produjo un error: " + error;
                                $("#mensaje-error").text(mensajeError);
                            }
                        });
                    }, 500); // Esperar 500 ms después de la última entrada antes de realizar la búsqueda
                }
                $('#ID_DELEGADO').val("");
                deshabilitarBotonDelegado();
            });

            //Envía a la vista el nombre del cargo seleccionado en búsqueda
            function obtenerNombreCargo(idCargoFuncionario) {
                var cargoSeleccionado = $('#ID_CARGO option[value="' + idCargoFuncionario + '"]').text();
                return cargoSeleccionado;
            }

            //Genera tabla de posibles funcionarios para realizar la búsqueda.
            function generarHTMLResultados(response) {
                var html = '<h4>Seleccione un funcionario(a)</h4>';
                html += '<table class="table"><thead><tr><th>Nombres</th><th>Apellidos</th><th>Rut</th><th>Cargo</th><th class="text-center">Ver Resoluciones</th></tr></thead><tbody>';
                response.forEach(function(item) {
                    var cargo = obtenerNombreCargo(item.ID_CARGO); // Obtener el nombre del cargo utilizando la función obtenerNombreCargo
                    html += "<tr><td>" + item.NOMBRES + "</td><td>" + item.APELLIDOS + "</td><td>" + item.RUT + "</td><td>" + cargo + "</td>";
                    html += '<td class="text-center"><button class="btn btn-primary btn-buscar-datos" data-nombres="' + item.NOMBRES + '" data-apellidos="' + item.APELLIDOS + '" data-rut="' + item.RUT + '" data-id-cargo="' + item.ID_CARGO + '" onclick="verResoluciones"><i class="fa-solid fa-magnifying-glass"></i></button></td>';
                });
                html += '</tbody></table>';
                return html;
            }

            // Agregar evento de clic al botón de búsqueda por cargo
            $('#buscarPorCargo').on('click', function() {
                $('#searchForm').submit(); // Enviar el formulario
            });

            $(document).on('click', '.btn-buscar-datos', function() {
                var nombres = $(this).data('nombres');
                var apellidos = $(this).data('apellidos');
                var rut = $(this).data('rut');
                var idCargoFuncionario = $(this).data('id-cargo');

                // Asignar los valores a los campos correspondientes
                $('#NOMBRES').val(nombres);
                $('#APELLIDOS').val(apellidos);
                $('#RUT').val(rut);
                $('#ID_CARGO').val(idCargoFuncionario);

                // Enviar el formulario
                $('#searchForm').submit();
            });

            //Control del botón búsqueda por cargo
            function deshabilitarBotonDelegado() {
                var selectedValue = $('#ID_DELEGADO').val();
                // Habilita o deshabilita el botón según la selección
                if (selectedValue !== "") {
                    $('#buscarPorCargo').prop('disabled', false);
                } else {
                    $('#buscarPorCargo').prop('disabled', true);
                }
            }

            // Agrega evento de clic al botón de expansión
            $('.btn-expand').on('click', function() {
                var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                var glosaCompleta = $(this).siblings('.glosa-completa');
                var btnExpand = $(this);
                var btnCollapse = $(this).siblings('.btn-collapse');

                glosaAbreviada.hide();
                glosaCompleta.show();
                btnExpand.hide();
                btnCollapse.show();
            });

            // Agregar evento de clic al botón de colapso
            $('.btn-collapse').on('click', function() {
                var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                var glosaCompleta = $(this).siblings('.glosa-completa');
                var btnExpand = $(this).siblings('.btn-expand');
                var btnCollapse = $(this);

                glosaAbreviada.show();
                glosaCompleta.hide();
                btnExpand.show();
                btnCollapse.hide();
            });

            $('#resoluciones').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "responsive": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": 8
                }], // La séptima columna no es ordenable
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });

            $('#ID_DELEGADO').change(function() {
                deshabilitarBotonDelegado();

                // Vaciar los campos si se selecciona un ID_DELEGADO
                if ($('#ID_DELEGADO').val() !== "") {
                    $('#NOMBRES').val("");
                    $('#APELLIDOS').val("");
                    $('#RUT').val("");
                    $('#ID_CARGO').val("");
                    $("#resultados-busqueda").empty();
                }
            });

            // Deshabilita el botón al cargar la página si no hay opción seleccionada inicialmente
            if ($('#ID_DELEGADO').val() === "") {
                $('#buscarPorCargo').prop('disabled', true);
            }
        });
    </script>
@stop
