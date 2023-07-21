@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Reportes de reservas</h1>
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
                <canvas id="myChart11"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart12"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart13"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
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
        window.myChartData11 = {
            // 12 gráfico Vehiculos asignados.
            // Aqui irian las patentes de los vehiculos.
            labels: {!! json_encode(array_column($grafico11, 'sala')) !!},
            datasets: [{
                label: 'Solicitudes de salas',
                data: {!! json_encode(array_column($grafico11, 'conteo')) !!},
                backgroundColor: [
                    'rgb(129, 255, 30)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };

        window.myChartData12 = {
            // 13 gráfico Solicitudes de vehiculos requeridos por departmaneto/unidad.
            labels: [
                @foreach ($grafico12 as $data)
                    '{{ $data["ubicacion"] }}',
                @endforeach
            ],
            datasets: [{
                label: 'Solicitudes realizadas',
                data: [
                        @foreach ($grafico12 as $data)
                            {{ $data["conteo"] }},
                        @endforeach
                    ],
                backgroundColor: [
                    'rgb(255, 190, 30)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };

        window.myChartData13 = {
            // 14 gráfico Gestionadores de solicitudes de reserva de salas.
            labels: [
                @foreach ($grafico13 as $data)
                    '{{ $data["nombre"] }}',
                @endforeach
            ],
            datasets: [{
                label: 'Solicitudes revisadas',
                data: [
                        @foreach ($grafico13 as $data)
                            {{ $data["conteo"] }},
                        @endforeach
                    ],
                backgroundColor: [
                    'rgb(30, 102, 255)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
</script>

<script src="{{asset('js/Reportes/Graficos/grafico11-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico12-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico13-config.js')}}"></script>




@endsection
