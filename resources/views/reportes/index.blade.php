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
        <div class="col">
            <button id="filter-button" class="btn btn-primary">Filtrar</button>
        </div>
    </div>
</div>
<div class="div">
    <canvas id="myChart"></canvas>
</div>

<!-- Código JavaScript -->
@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('myChart');

        // Obtener los elementos de los inputs de fecha
        const startDateInput = document.getElementById('start-date');
        const endDateInput = document.getElementById('end-date');
        const filterButton = document.getElementById('filter-button');

        // Obtener los datos de las solicitudes desde el controlador
        const cantidadSalas = @json($cantidadSalas);
            const cantidadSolRepVeh = @json($cantidadSolRepVeh);

            const data = {
                labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
                datasets: [{
                    label: 'Cantidad',
                    data: [cantidadSalas, 0, cantidadSolRepVeh, 0],
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
            // Configuración de opciones del gráfico
        };

        // Crear el gráfico
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: options
        });

        // Resto del código JavaScript...

    });
</script>
@endsection

@endsection
@section('css')
<style>
.alert {
opacity: 0.7; /* Ajusta la opacidad a tu gusto */
background-color: #99CCFF;
color: #000000;
}
</style>
@stop

@section('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection
