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
        <!-- Base para el Tercer gráfico Total de Funcionarios (Hombres/mujeres)-->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
        <!-- Base para el Cuarto gráfico Vehiculos asignados y creacion de base para georeferenciacion. -->
        <div class="col-md-6">
        <div class="chart-container">
            <div id="map" style="display: none;"></div>
                <canvas id="myChart3"></canvas>
                <button id="view-chart3" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
                <button id="map-open" class="btn btn-primary move-right" onclick="toggleMap()"><i class="fa-solid fa-map-location-dot"></i></button>
            </div>
        </div>
        <!-- Grafico cuarto  materiales en espera-->
        <!-- <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart4"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div> -->
        <!-- Base para el Quinto gráfico Gestionadores de solicitudes de materiales. -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart5"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Sexto gráfico estados de solicitudes de materiales/mes. -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart6"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Septimo gráfico materiales consumidos por departamento/unidad. -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart7"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base pra el Octavo gráfico Estado de solicitudes de reserva de vehiculo. -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart8"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Noveno gráfico Solicitudes de vehiculos requeridos por departmaneto/unidad.-->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart9"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Decimo gráfico Gestionadores de solicitudes de reserva de vehiculo. -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart10"></canvas>
                <button id="view-chart4" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
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
            // Primer gráfico Total de solicitudes 1
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
            // Segundo gráfico Total de solicitudes 2
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
            // Tercer gráfico Total de Funcionarios (Hombres/mujeres)
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
        window.myChartData3 = {
            // Cuarto gráfico Vehiculos asignados.
            // Aqui irian las patentes de los vehiculos.
            labels: {!! json_encode(array_column($grafico3, 'patente')) !!},
            datasets: [{
                label: 'Solicitudes',
                data: {!! json_encode(array_column($grafico3, 'conteo')) !!},
                backgroundColor: [
                    'rgb(129, 255, 30)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData5 = {
            // Quinto gráfico estados de solicitudes de materiales.
            labels: [],
            datasets: [{
                label: 'Solicitudes revisadas',
                data: [],
                backgroundColor: 'rgb(30, 102, 255)',
                barThickness: 50,
                borderWidth: 1
            }]
        };

        var grafico5Data = @json($grafico5);

        grafico5Data.forEach(function(item) {
            window.myChartData5.labels.push(item.nombre);
            window.myChartData5.datasets[0].data.push(item.conteo);
        });

        window.myChartData6 = {
            // Sexto gráfico estados de solicitudes de materiales.
            labels: ['Material'],
            datasets: [{
                label: 'Ingresado',
                data: [1,1,1,1],
                backgroundColor: 'rgb(255, 151, 0)',
                barThickness: 50,
                borderWidth: 1
            }
            ] 
        };
        window.myChartData7 = {
            // sexto gráfico materiales consumidos por ubicaciones.
            labels: @json(array_column($grafico7, 'ubicacion')),
            datasets: [{
                label: 'Solicitudes realizadas',
                data: @json(array_column($grafico7, 'conteo')),
                backgroundColor: [
                    'rgb(255, 224, 0)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData8 = {
            // Octavo gráfico Estado de solicitudes de reserva de vehiculo.
            labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
            datasets: [{
                label: 'Ingresado',
                data: [1,1,1,1],
                backgroundColor: 'rgb(255, 151, 0)',
            }, {
                label: 'Por autorizar',
                data: [1,2,2,2,2],
                backgroundColor: 'rgb(255, 255, 0 )',
            }, {
                label: 'Suspendido',
                data: [1],
                backgroundColor: 'rgb(255, 0, 0)',
            }, {
                label: 'Rechazado',
                data: [1,1,1,1,1,1,1,1,1,1,1,1],
                backgroundColor: 'rgb(0, 0, 0)',
            }]
        };
        window.myChartData9 = {
            // Noveno gráfico Solicitudes de vehiculos requeridos por departmaneto/unidad.
            labels: ['Unidad de los Angeles', 'Unidad de Lebu', 'Unidad de Talcahuano', 'No asignado', 'Gabinete director','Departamento de administracion','Departamento de Fiscalizacion','Departamento de asistencia al contribuyente','Departamento de avaluaciones','Departamento de procedimientos administrativos tributarios','Departamento juridico'],
            datasets: [{
                label: 'Solicitudes realizadas',
                data: [1,1,1,1,1,1,1,1,1,1],
                backgroundColor: [
                    'rgb(255, 224, 0)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData10 = {
            // Decimo gráfico Gestionadores de solicitudes de reserva de vehiculo.
            labels: ['ALEJANDRA IVONNE' , 'CAROLA OPAZO VENEGAS' ,'x','SAMUEL EDGARDO'],
            datasets: [{
                label: 'Solicitudes revisas',
                data:[1,2,3,4],
                backgroundColor: [
                    'rgb(30, 102, 255)', // Color de fondo único para todas las barras
                    'rgb(255, 99, 132)', // Color para CAROLA OPAZO VENEGAS
                    'rgb(54, 162, 235)', // Color para x
                    'rgb(75, 192, 192)' // Color para SAMUEL EDGARDO
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData11 = {
            // onceavo gráfico Vehiculos asignados.
            // Aqui irian las patentes de los vehiculos.
            labels: ['CARMEN PROSSER','VIDEO CONFERENCIA','SALA REUNION DR','HALL RENTA','SALA 1','EXTERNA' ,'OFICINA ASISTENTE SOCIAL'],
            datasets: [{
                label: 'Solicitudes de salas',
                data: [1,2,3,4,5,6,7],
                backgroundColor: [
                    'rgb(129, 255, 30)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData12 = {
            // doceavo gráfico Solicitudes de vehiculos requeridos por departmaneto/unidad.
            labels: ['Unidad de los Angeles', 'Unidad de Lebu', 'Unidad de Talcahuano', 'No asignado', 'Gabinete director','Departamento de administracion','Departamento de Fiscalizacion','Departamento de asistencia al contribuyente','Departamento de avaluaciones','Departamento de procedimientos administrativos tributarios','Departamento juridico'],
            datasets: [{
                label: 'Solicitudes realizadas',
                data: [1,2,3,4,5,6,7,8,9,10,11],
                backgroundColor: [
                    'rgb(255, 224, 0)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
        window.myChartData13 = {
            // Terceavo gráfico Gestionadores de solicitudes de reserva de salas.
            labels: ['ADOLFO MAURICIO' , 'CARLOS ALBERTO' ,'CESAR LEONARDO','CLAUDIA CAROLINA','DAVID ESTEBAN','DIEGO','JOHANA ELIZABETH','JORGE LUIS','LILIAN','LUCILA ESTEPHANIA','LUIS ARSENIO','MAURICIO MARCELO','MIRIAM CAROLINA','SORAYA EDITH','SUSAN','VERONICA ENRIQUETA','VICTOR MANUEL','XIMENA ELIZABETH'],
            datasets: [{
                label: 'Solicitudes revisas',
                data:[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18],
                backgroundColor: [
                    'rgb(30, 102, 255)', // Color de fondo único para todas las barras
                ],
                barThickness: 50, // Ajusta el valor para cambiar el ancho de la barra
                borderWidth: 1
            }]
        };
</script>

<script src="{{asset('js/Reportes/Graficos/grafico-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico1-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico2-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico3-config.js')}}"></script>
<!-- <script src="{{asset('js/Reportes/Graficos/grafico4-config.js')}}"></script> -->
<script src="{{asset('js/Reportes/Graficos/grafico5-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico6-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico7-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico8-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico9-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico10-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico11-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico12-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico13-config.js')}}"></script>




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


<!-- Scrip para inicizaliar el mapa -->
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

            // Talcahuano
            L.marker([-36.7167, -73.1167]).addTo(map)
                .bindPopup('FJGK-74 Salida de Vehiculo')
                .openPopup();

            // Coronel
            L.marker([-37.0167, -73.1333]).addTo(map)
                .bindPopup('FJGK-74 Llegada de Vehiculo')
                .openPopup();

            // Tome
            L.marker([-36.6155, -72.9561]).addTo(map)
                .bindPopup('HSHV-23 Salida de Vehiculo')
                .openPopup();

            // Este apartado es para mostrar los pings en el mapa (Concepcion)
            L.marker([-36.8261, -73.0498]).addTo(map)
                .bindPopup('HSHV-23 Llegada de Vehiculo')
                .openPopup();

            // var polyline1 = L.polyline([[-36.8261, -73.0498], [-36.6155, -72.9561]]).addTo(featureGroup);
            // var polyline2 = L.polyline([[-36.7167, -73.1167], [-37.0167, -73.1333]]).addTo(featureGroup);

            // // Establecer estilo personalizado para las polilíneas
            // polyline1.setStyle({ color: 'red' });
            // polyline2.setStyle({ color: 'blue' });

            // Agregar el control de enrutamiento
            L.Routing.control({
                waypoints: [
                    L.latLng(-36.8261, -73.0498),  // Coordenadas de Concepción
                    L.latLng(-36.6155, -72.9561)   // Coordenadas de Tome
                ],
                lineOptions: {
                    styles: [
                        { color: 'red', opacity: 0.6, weight: 4 },
                    ]
                }
            }).addTo(map);
            L.Routing.control({
                waypoints: [
                    L.latLng(-37.0167, -73.1333),  // Coordenadas de Coronel
                    L.latLng(-36.7167, -73.1167)   // Coordenadas de Talcahuano
                ],
                lineOptions: {
                    styles: [
                        { color: 'blue', opacity: 0.6, weight: 4 },
                    ]
                }
            }).addTo(map);
        }

        mapOpenButton.addEventListener('click', toggleMap);
    });
</script>


@endsection
