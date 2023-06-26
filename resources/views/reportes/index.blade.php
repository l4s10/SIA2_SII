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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('js')
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$(document).ready(function() {
    // Manejar el evento de clic en el enlace
    $('#view-chart').click(function(e) {
        e.preventDefault();

        // Obtener la imagen del gráfico
        var chartImage = $('#myChart')[0].toDataURL();

        // Mostrar el gráfico en un modal
        var modalContent = '<img src="' + chartImage + '" alt="Gráfico" style="width: 100%;">';
        $('#chart-modal .modal-body').html(modalContent);
        $('#chart-modal').modal('show');
    });
});
</script>

    <script>
        flatpickr('#start-date', {
            locale: 'es',
            dateFormat: "Y-m-d",
            altFormat: 'd-m-Y',
            altInput: true,
        });

        flatpickr('#end-date', {
            locale: 'es',
            dateFormat: "Y-m-d",
            altFormat: 'd-m-Y',
            altInput: true,
        });
    </script>

<script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Solicitud Sala', 'Solicitud Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
                datasets: [{
                    label: 'Cantidad de Solicitudes',
                    data: [@foreach($Grafico_1 as $AUX) {{ $AUX }}, @endforeach],
                    backgroundColor: [
                        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
                        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
                        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
                        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Solicitud'
                        }
                    },
                    y: {
                        beginAtZero: true,
                        title: {
                            display: true,
                            text: 'Cantidad'
                        }
                    }
                },
                plugins: {
                    legend: {
                        display: true,
                        labels: {
                            generateLabels: function (chart) {
                                const data = chart.data;
                                if (data.labels.length && data.datasets.length) {
                                    return data.labels.map(function (label, index) {
                                        const dataset = data.datasets[0];
                                        const backgroundColor = dataset.backgroundColor[index];
                                        return {
                                            text: label,
                                            fillStyle: backgroundColor,
                                            hidden: false,
                                            lineCap: 'round',
                                            lineDash: [],
                                            lineDashOffset: 0,
                                            lineJoin: 'round',
                                            lineWidth: 1,
                                            strokeStyle: backgroundColor,
                                            pointStyle: 'circle',
                                            rotation: 0
                                        };
                                    });
                                }
                                return [];
                            }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Ranking de Solicitudes',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    }
                }
            }
        });

        document.querySelector('#refresh-button').addEventListener('click', function () {
            var fechaInicio = document.querySelector('#start-date').value;
            var fechaFin = document.querySelector('#end-date').value;

            Swal.fire({
                title: 'Actualizando registros',
                timer: 2000,
                didOpen: () => {
                Swal.showLoading();
                },
                willClose: () => {
                // Al cerrarse
                }
            });

            fetch('/reportes/data', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({
                    fechaInicio: fechaInicio,
                    fechaFin: fechaFin
                })
            })
                .then(response => response.json())
                .then(data => {
                    myChart.data.datasets[0].data = [
                        data.solicitudSala,
                        data.solicitudBodegas,
                        data.solicitudReparacionVehiculo,
                        data.relFunVeh
                    ];
                    myChart.update();
                });
        });
</script>
@endsection
