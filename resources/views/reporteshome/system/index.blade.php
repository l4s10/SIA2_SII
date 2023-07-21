@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Reportes generales del sistema</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.</div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.</div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.</div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.</div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.</div>
    </div>
    @endrole
@endsection

@section('content')

    <!-- Agrega los elementos input de fecha aquí -->
    <div class="container overflow-hidden">
        <div class="row gx-5 custom-row">
            <div class="col-md-3">
                <label for="start-date">Fecha de inicio:</label>
                <input type="date" id="start-date" name="fechaInicio" class="form-control" placeholder="Indique fecha inicio">
            </div>
            <div class="col-md-3">
                <label for="end-date">Fecha de fin:</label>
                <input type="date" id="end-date" name="fechaFin" class="form-control" placeholder="Indique fecha fin">
            </div>
            <div class="col-md-3 custom-button">
                <button id="refresh-button" class="btn btn-primary btn-refresh">Refrescar fechas</button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Base para el Primer gráfico Total de solicitudes 1 -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart"></canvas>
                <button id="view-chart" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
                <button id="print-button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button>
                <button id="download-png-button" class="btn btn-primary"><i class="fa-solid fa-image"></i></button>
            </div>
        </div>
        <!-- Base para el Segundo gráfico Total de solicitudes 2 -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart1"></canvas>
                <button id="view-chart1" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Cuarto gráfico Vehiculos asignados y creacion de base para georeferenciacion. -->
        <div class="col-md-6">
        <div class="chart-container">
            <div id="map" style="display: none;"></div>
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
    <br>
    <!-- Modal para mostrar el gráfico en grande -->
    <div class="modal fade" id="chart-modal" tabindex="-1" aria-labelledby="chart-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="chart-modal-label">Gráfico en grande</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" ><i class="fa-solid fa-xmark"></i></button>
            </div>
                <div class="modal-body">
                <!-- Aquí se mostrará el gráfico en grande -->
                <canvas id="modalChart"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <h2>Tabla de contingencia</h2>
    <h5>Filtros (llenar todos los campos)</h5>
    <div class="row" style="padding-bottom:3%;">
        <div class="col-lg-4">
            <label for="">Region:</label>
            <select name="region" id="region-select" class="form-control">
                <option value="">Selecciona la región</option>
                @foreach($regiones as $region)
                    <option value="{{ $region->ID_REGION }}">{{ $region->REGION }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-lg-4">
            <label for="">Jurisdicción</label>
            <select name="direccion" id="direccion-select" class="form-control">
                <option value="">Selecciona la dirección regional</option>
            </select>
        </div>
        <div class="col-lg-4">
            <label for="">Departamento/Ubicación</label>
            <select name="ubicacion" id="ubicacion-select" class="form-control">
                <option value="">Selecciona la ubicación</option>
            </select>
        </div>
    </div>
    <table id="ubicaciones-table" class="table table-striped">
        <thead>
            <tr>
                <th>Ubicación</th>
                <th>Hombres</th>
                <th>Mujeres</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
        <tfoot>
            <tr>
                <th>Total:</th>
                <th id="total-hombres">0</th>
                <th id="total-mujeres">0</th>
                <th id="total-total">0</th>
            </tr>
        </tfoot>
    </table>
</div>


@endsection

@section('css')
<style>
        .alert {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #99CCFF;
            color: #000000;
        }

        .chart-container {
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }

        .custom-button {
            margin-top: 30px;
        }

        .custom-row {
            margin-top: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }
</style>
{{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="crossorigin=""/>

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.2.0/dist/leaflet.css" />
<link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
@stop

@section('js')
    {{-- <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <!-- DataTables -->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>

    {{-- CHART.JS --}}
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- Chart.js Plugin: Chart.js Plugin Annotations -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-annotation"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-download"></script>
    <!-- Chart.js Plugin: Chart.js Plugin HTML Legend -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-htmllegend"></script>
    <!-- Chart.js Plugin: Chart.js Plugin Chart-Title -->
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-chart-title"></script>
    {{-- !!LLAMAMOS A SCRIPT CALENDARIO DE RANGOS --}}
    <script src="{{ asset('js/Reportes/Calendarios/range-calendar.js') }}"></script>
    {{-- !!FUNCION PARA MOSTRAR EN GRANDE --}}
    <!-- Leaflet version mas reciente -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
    <script src="https://unpkg.com/leaflet@1.2.0/dist/leaflet.js"></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>

<script>
    function showChart(chartId) {
        // Obtener la imagen del gráfico
        var chartImage = $('#' + chartId)[0].toDataURL();
        // Mostrar el gráfico en un modal
        var modalContent = '<img src="' + chartImage + '" alt="Gráfico" style="width: 100%;">';
        $('#chart-modal .modal-body').html(modalContent);
        $('#chart-modal').modal('show');
    }

    $(document).ready(function() {
        // Manejar el evento de clic en el enlace del primer gráfico
        $('#view-chart').click(function(e) {
            e.preventDefault();
            showChart('myChart');
        });

        // Manejar el evento de clic en el enlace del segundo gráfico
        $('#view-chart1').click(function(e) {
            e.preventDefault();
            showChart('myChart1');
        });

        // Manejar el evento de clic en el enlace del tercer gráfico
        $('#view-chart2').click(function(e) {
            e.preventDefault();
            showChart('myChart2');
        });
    });
</script>
<!-- Inicializacion de los graficos -->

<script>
        window.myChartData = {
            // 1 gráfico Total de solicitudes 1
            labels: ['Solicitud Sala', 'Solicitud Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: [@foreach($grafico as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(250, 215, 160)', // Color de fondo para Salas (piel)
                    'rgb(244, 0, 0)', // Color de fondo para Bodegas (rojo)
                    'rgb(56, 231, 0)', // Color de fondo para Reserva de Vehículos (verde)
                    'rgb(0, 232, 255)', // Color de fondo para Reparación de Vehículos (celeste)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData1 = {
            // 2 gráfico Total de solicitudes 2
            labels: ['Solicitud de materiales', 'Solicitud de Reparación para Inmuebles', 'Formularios' ,'Equipos'],
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: [@foreach($grafico1 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(194, 3, 255)', // Color de fondo para el segundo gráfico (morado)
                    'rgb(3, 41, 255)', // Color de fondo para el segundo gráfico (Azul)
                    'rgb(255, 3, 209)', // Color de fondo para el segundo gráfico (Rosa)
                    'rgb(3, 255, 160 )',// Color de fondo para el segudno grafico (verde claro)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData2 = {
            // 3 gráfico Total de Funcionarios (Hombres/mujeres)
            labels: ['Hombres', 'Mujeres'],
            datasets: [{
                label: 'Cantidad Total',
                data: [@foreach($grafico2 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(3, 41, 255)', // Color de fondo para el segundo gráfico (Azul)
                    'rgb(19, 143, 0)', // Color de fondo para el segundo gráfico (Verde)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
</script>

<script src="{{asset('js/Reportes/Graficos/grafico-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico1-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico2-config.js')}}"></script>





{{--!! tabla contingencia (FILTROS) --}}
<script>
    $(document).ready(function () {
        var selectedUbicaciones = {};

        //Datatable inicial
        // Inicializa la tabla como DataTable
        var table = $('#ubicaciones-table').DataTable({
            "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
            "responsive": true,
            "columnDefs": [
                { "orderable": false, "targets": 3 }
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
        });

        //Select region
        $('#region-select').on('change', function() {
            var regionId = $(this).val();

                // Limpia los selectores de direcciones regionales y ubicaciones
            $('#direccion-select').empty();
            $('#direccion-select').append('<option>Selecciona una dirección regional</option>'); // Agrega nuevamente la opción predeterminada

            $('#ubicacion-select').empty();
            $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

            if(regionId) {
                $.ajax({
                    url: '/get-direcciones/'+regionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            $('#direccion-select').append('<option value="'+ value.ID_DIRECCION +'">'+ value.DIRECCION +'</option>');
                        });
                    }
                });
            }
        });
        //Select direccion regional
        $('#direccion-select').on('change', function() {
            var direccionId = $(this).val();

            // Limpia el selector de ubicaciones
            $('#ubicacion-select').empty();
            $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

            if(direccionId) {
                $.ajax({
                    url: '/get-ubicaciones/'+direccionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        $.each(data, function(key, value) {
                            if(!selectedUbicaciones[value.ID_UBICACION]) { // Si la ubicación no ha sido seleccionada previamente
                                $('#ubicacion-select').append('<option value="'+ value.ID_UBICACION +'">'+ value.UBICACION +'</option>');
                            }
                        });
                    }
                });
            }
        });
        //FIN FILTROS
        //select ubicacion y filtrado
        $('#ubicacion-select').on('change', function() {
            var ubicacionId = $(this).val();

            if(ubicacionId && !selectedUbicaciones[ubicacionId]) {
                $.ajax({
                    url: '/get-totals/'+ubicacionId,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                        var tableRow = [data.ubicacion, data.hombres, data.mujeres, data.total];
                        table.row.add(tableRow).draw(); // Agrega la nueva fila y re-renderiza la tabla
                        selectedUbicaciones[ubicacionId] = true; // Agrega el ubicacionId seleccionado al objeto selectedUbicaciones

                        // Actualizar los totales
                        $('#total-hombres').text(Number($('#total-hombres').text()) + data.hombres);
                        $('#total-mujeres').text(Number($('#total-mujeres').text()) + data.mujeres);
                        $('#total-total').text(Number($('#total-total').text()) + data.total);

                        // Obtener el ID de la dirección actualmente seleccionada
                        var direccionId = $('#direccion-select').val();

                        // Realizar una nueva solicitud AJAX para obtener las ubicaciones
                        $.ajax({
                            url: '/get-ubicaciones/'+direccionId,
                            type: 'GET',
                            dataType: 'json',
                            success: function(data) {
                                $('#ubicacion-select').empty();
                                $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

                                $.each(data, function(key, value) {
                                    if(!selectedUbicaciones[value.ID_UBICACION]) { // Si la ubicación no ha sido seleccionada previamente
                                        $('#ubicacion-select').append('<option value="'+ value.ID_UBICACION +'">'+ value.UBICACION +'</option>');
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });

    });
</script>

<!-- Scrip para Descargar graficos -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
    const printButton = document.getElementById('print-button');
    printButton.addEventListener('click', function () {
    window.print();
    });

    const downloadPNGButton = document.getElementById('download-png-button');
    downloadPNGButton.addEventListener('click', function () {
        const link = document.createElement('a');
        link.href = myChart.toBase64Image('image/png', { backgroundColor: '#FFFFFF' });
        link.download = 'Grafico.png';
        link.click();
    });
});
</script>

@endsection
