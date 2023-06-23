@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
<meta name="csrf-token" content="{{ csrf_token() }}">
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
<div class="row ">
    <div class="col-md-6">
        <div class="chart-container">
            <canvas id="myChart"></canvas>
        </div>
    </div>

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
    <style>
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
            labels: ['Solicitud Materiales', 'Solicitud Reparacion Vehiculo', 'Solicitud Sala', 'Solicitud Bodegas'],
            datasets: [{
                label: 'Cantidad de Solicitudes',
                data: [@php foreach($Grafico_1 as $AUX) echo $AUX . ','  @endphp],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        // Incluir solo números enteros
                        stepSize: 1
                    }
                }
            }
        }
    });
</script>


<script>
    document.querySelector('#refresh-button').addEventListener('click', function() {
        var fechaInicio = document.querySelector('#start-date').value;
        var fechaFin = document.querySelector('#end-date').value;

        Swal.fire({
            title: 'Actualizando registros',
            timer: 2000,
            didOpen: () => {
                Swal.showLoading()
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
                data.solicitudMateriales,
                data.solicitudReparacionVehiculo,
                data.solicitudSala,
                data.solicitudBodegas
            ];
            myChart.update();
        });
    });
    </script>
@endsection
