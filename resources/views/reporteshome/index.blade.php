@extends('adminlte::page')

@section('title', 'Menú Reportes')

@section('content_header')
    <h1>Menú reporteria general del sistema</h1>
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

@stop

@section('content')
<div class="container">
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @endif


    <div class="container-fluid d-flex justify-content-center align-items-center flex-column">
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
                <div class="card-header">Módulo Reportes de vehiculos</div>
                <div class="card-body">
                    <p class="card-text">Este módulo permite ver los reportes de <strong>Vehiculos</strong>. Para saber las cantidades de solicitudes de <strong>Vehiculos</strong> del sistema completo.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('reportes.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
                </div>
            </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
                <div class="card-header">Módulo Reportes de materiales</div>
                <div class="card-body">
                    <p class="card-text">Este módulo permite ver los reportes de <strong>Materiales</strong>. Para saber las cantidades de solicitudes de <strong>Materiales</strong> del sistema completo.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
                </div>
            </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
                <div class="card-header">Módulo Reportes de reparaciones y mantenciones</div>
                <div class="card-body">
                    <p class="card-text">Este módulo permite ver los reportes de <strong>reparaciones y mantenciones</strong>. Para saber las cantidades de solicitudes de <strong>reparaciones y mantenciones</strong> del sistema completo.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
                </div>
            </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
                <div class="card-header">Módulo Reportes de equipos</div>
                <div class="card-body">
                    <p class="card-text">Este módulo permite ver los reportes de <strong>Equipos</strong>. Para saber las cantidades de solicitudes de <strong>Equipos</strong> del sistema completo.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
                </div>
            </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
                <div class="card-header">Módulo Reportes de reservas</div>
                <div class="card-body">
                    <p class="card-text">Este módulo permite ver los reportes de <strong>Reservas</strong>. Para saber las cantidades de solicitudes de <strong>Reservas</strong> del sistema completo.</p>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
                </div>
            </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Reporte de inventario</div>
            <div class="card-body">
                <p class="card-text">Este módulo permite ver los reportes de <strong>Inventario</strong>. Para saber las cantidades de solicitudes de <strong>Inventario</strong> del sistema completo.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
            </div>
        </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Reportes del sistema</div>
            <div class="card-body">
                <p class="card-text">Este módulo permite ver los reportes del <strong>Sistema</strong>. Para saber las cantidades de solicitudes del <strong>Sistema</strong> del sistema completo.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('reportestablas.index')}}"><i class="fa-solid fa-chart-pie"></i> Graficos</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#materiales').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>

@stop