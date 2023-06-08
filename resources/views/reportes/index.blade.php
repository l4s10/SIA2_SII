@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Reportes</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.<div>
    </div>
    @endrole
@endsection

@section('content')
<div>
<canvas id="myChart"></canvas>
</div>
@endsection

@section('css')
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
@stop

@section('js')
<!-- CONEXION FONT-AWESOME CON TOOLKIT -->
<script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart');
        const data = {
            labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
            datasets: [{
                data: [12, 19, 3, 5],
                backgroundColor: [
                    'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
                    'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
                    'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
                    'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
                ],
                borderWidth: 1
            }]
        };
        const options = {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Solicitud',
                    }
                },
                y: {
                    // Configuración de la escala y
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad' // Título para el eje y
                    }
                }
            },
            plugins: {
                legend: {
                    display: true, // Mostrar la leyenda
                    labels: {
                        generateLabels: function(chart) {
                            const data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                return data.labels.map(function(label, index) {
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
                    text: 'Ranking de Solicitudes', // Título del gráfico
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        };

        new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });
    });
</script>

@endsection
