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
<!-- Agrega los elementos input de fecha aquí -->
<div class="container overflow-hidden">
    <div class="row gx-5">
        <div class="col">
            <label for="start-date">Fecha de inicio:</label>
            <input type="date" id="start-date" class="form-control">
        </div>
        <div class="col">
            <label for="end-date">Fecha de fin:</label>
            <input type="date" id="end-date" class="form-control">
        </div>
    </div>
</div>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart');

        // Obtener los elementos de los inputs de fecha
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');

        const data = {
            labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
            datasets: [{
                label: 'Cantidad',
                data: [], // Aquí se cargarán los datos JSON
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
                    text: 'Ranking de Solicitudes',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        };

        // Función para filtrar los datos según el rango de fechas seleccionado
        function filterDataByDate(data, startDate, endDate) {
            // Implementa tu lógica de filtrado de datos aquí
            // Puedes utilizar las fechas seleccionadas (startDate y endDate)
            // para filtrar los datos según el rango deseado
            // y devolver los datos filtrados en el formato requerido para el gráfico
            // Aquí hay un ejemplo básico que simplemente devuelve los datos sin filtrar:
            return data;
        }

        // Función para cargar los datos JSON en el gráfico
        function loadChartData() {
            // Aquí debes realizar una petición AJAX para obtener los datos JSON desde tu servidor
            // Puedes utilizar la función fetch() o jQuery.ajax() para realizar la petición
            // Una vez que hayas obtenido los datos JSON, puedes asignarlos al gráfico y actualizarlo

            // Ejemplo básico de cómo cargar datos JSON en el gráfico:
            const jsonData = [
                { label: 'Salas', value: 10 },
                { label: 'Bodegas', value: 5 },
                { label: 'Reparación de Vehículos', value: 8 },
                { label: 'Reserva de Vehículos', value: 3 }
            ];

            // Mapear los datos JSON al formato requerido por el gráfico
            const chartData = jsonData.map(item => item.value);

            // Actualizar los datos del gráfico
            myChart.data.datasets[0].data = chartData;
            myChart.update();
        }

        // Crear el gráfico inicial
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

        // Cargar los datos JSON en el gráfico al cargar la página
        loadChartData();


        // Escuchar el evento de cambio en los inputs de fecha
        startDateInput.addEventListener('change', updateChart);
        endDateInput.addEventListener('change', updateChart);
    });
</script>
@endsection
