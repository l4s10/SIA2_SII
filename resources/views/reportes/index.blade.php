@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <h1>Reportes</h1>
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
                <input type="date" id="start-date" class="form-control" placeholder="Indique fecha inicio">
            </div>
            <div class="col-md-3">
                <label for="end-date">Fecha de fin:</label>
                <input type="date" id="end-date" class="form-control" placeholder="Indique fecha fin">
            </div>
            <div class="col-md-3 custom-button">
                <button id="refresh-button" class="btn btn-primary btn-refresh">Refrescar fechas</button>
            </div>
        </div>
    </div>
    <br>
    <div class="row">
        <!-- Base para el primer Grafico solicitudes1 -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart"></canvas>
                <button id="view-chart" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
                <button id="print-button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button>
                <button id="download-png-button" class="btn btn-primary"><i class="fa-solid fa-image"></i></button>
            </div>
        </div>
        <!-- Base para el segundo Grafico solicitudes2 -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart1"></canvas>
                <button id="view-chart1" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Tercer Grafico Hombres/Mujeres-->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart2"></canvas>
                
            </div>
        </div>
        <div class="col-md-6">
        <div class="chart-container">
            <div id="map" style="display: none;"></div>
                <canvas id="myChart3"></canvas>

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

<!-- Agrega el código de la tabla de contingencia vacía -->

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

@stop

@section('js')
    {{-- <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script> --}}
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
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
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="crossorigin=""></script>
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
<script>
        window.myChartData = {
            // Primer gráfico Total de solicitudes 1
            labels: ['Solicitud Sala', 'Solicitud Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: [@foreach($grafico1 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(250, 215, 160)', // Color de fondo para Salas (piel)
                    'rgb(244, 0, 0)', // Color de fondo para Bodegas (rojo)
                    'rgb(56, 231, 0)', // Color de fondo para Reserva de Vehículos (verde)
                    'rgb(0, 232, 255)', // Color de fondo para Reparación de Vehículos (celeste)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        }
        window.myChartData1 = {
            // Segundo gráfico Total de solicitudes 2
            labels: ['Solicitud de materiales', 'Solicitud de Reparación para Inmuebles', 'Formularios' ,'Equipos'],
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: [@foreach($grafico2 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(194, 3, 255)', // Color de fondo para el segundo gráfico (morado)
                    'rgb(3, 41, 255)', // Color de fondo para el segundo gráfico (Azul)
                    'rgb(255, 3, 209)', // Color de fondo para el segundo gráfico (Rosa)
                    'rgb(3, 255, 160 )',// Color de fondo para el segudno grafico (verde claro)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        }
        window.myChartData2 = {
            // Tercer gráfico Total de Funcionarios (Hombres/mujeres)
            labels: ['Hombres', 'Mujeres'],
            datasets: [{
                label: 'Cantidad Total',
                data: [@foreach($grafico3 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(3, 41, 255)', // Color de fondo para el segundo gráfico (Azul)
                    'rgb(19, 143, 0)', // Color de fondo para el segundo gráfico (Verde)
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData3 = {
            // Cuarto gráfico estado de solicitud de materiales.
            // Aqui irian las patentes de los vehiculos.
            labels: ['X', 'X1', 'X2', 'X3', 'X4', 'X5', 'X6', 'X7', 'X8', 'X9', 'X10', 'X11', 'X12'],
            datasets: [{
                label: 'Cantidad de Solicitud',
                // data: [@foreach($grafico3 as $AUX) {{ round($AUX) }}, @endforeach],
                backgroundColor: [
                    'rgb(3, 41, 255)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
</script>

<script src="{{asset('js/Reportes/Graficos/grafico1-config.js')}}"></script>  
<script src="{{asset('js/Reportes/Graficos/grafico2-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico3-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico4-config.js')}}"></script>

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


<script>
    document.addEventListener('DOMContentLoaded', function() {
        var mapDiv = document.getElementById('map');
        var mapOpenButton = document.getElementById('map-open');
        var map;
        var featureGroup;

        function toggleMap() {
            if (mapDiv.style.display === 'none') {
                mapDiv.style.display = 'block';
                mapDiv.requestFullscreen(); // Solicita el modo de pantalla completa para el elemento del mapa
                initializeMap();
            } else {
                mapDiv.style.display = 'none';
                document.exitFullscreen(); // Sale del modo de pantalla completa si el mapa ya no está visible
                mapOpenButton.disabled = false; // Restablece el botón a su estado original
            }
        }

        function initializeMap() {
            map = L.map('map').setView([-36.8261, -73.0498], 13); // Coordenadas de Concepción, Chile y nivel de zoom 13

            L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);      
            // Crea un grupo de capas
            featureGroup = L.featureGroup().addTo(map);
            L.marker([-38.7396, -72.5984]).addTo(map)
            .bindPopup('Salida de Vehiculo')
            .openPopup();
            L.marker([-36.8261, -73.0498]).addTo(map)
            .bindPopup('Llegada de Vehiculo')
            .openPopup();
            var polyline = L.polyline([[-36.8261, -73.0498], [-38.7396, -72.5984]]).addTo(featureGroup);
        }
        mapOpenButton.addEventListener('click', toggleMap);
    });
</script>

@endsection