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
    <!-- Asignacion de los calendarios. -->
    <br>
    <div class="row">
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart"></canvas>
                <button id="view-chart" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el segundo Grafico -->
        <div class="col-md-6">
            <div class="chart-container">
                <canvas id="myChart1"></canvas>
                <button id="view-chart1" class="btn btn-primary move-right"><i class="fa-solid fa-maximize"></i></button>
            </div>
        </div>
        <!-- Base para el Tercer Grafico -->
        <div class="col-md-6">
            <div class="chart-container">
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
    {{-- !!LLAMAMOS A SCRIPT CALENDARIO DE RANGOS --}}
    <script src="{{ asset('js/Reportes/Calendarios/range-calendar.js') }}"></script>
    {{-- !!FUNCION PARA MOSTRAR EN GRANDE --}}
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
</script>

<script src="{{asset('js/Reportes/Graficos/grafico1-config.js')}}"></script>  
<script src="{{asset('js/Reportes/Graficos/grafico2-config.js')}}"></script>
<script src="{{asset('js/Reportes/Graficos/grafico3-config.js')}}"></script>

@endsection
