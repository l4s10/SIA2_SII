@extends('adminlte::page')

@section('title', 'Menú mantenciones y reparaciones')

@section('content_header')
    <h1>Menú mantenciones y reparaciones</h1>
@stop

@section('content')
<div class="container">
    <!-- en el href, hacemos referencia dentro de la carpeta de vistas -->
    <!-- <a href="materiales/create" class="btn btn-primary mb-3">CREAR</a> -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exito! </strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif


    @if(session('error'))
        <div class="alert alert-danger alert-dissmissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
    @endif
    <div class="container-fluid d-flex justify-content-center align-items-center flex-column">
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Inmuebles</div>
            <div class="card-body">
                <p class="card-text">Este módulo permite a los funcionarios reportar problemas en los <strong>inmuebles</strong>. Los funcionarios deberán proporcionar información detallada y el equipo encargado del mantenimiento o soporte técnico tomará las medidas para solucionar el problema.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('reparaciones.create')}}"><i class="fa-solid fa-file-pen"></i> Solicitar</a>
                <a class="btn btn-primary" href="{{route('reparaciones.index')}}"><i class="fa-solid fa-eye"></i> Solicitudes</a>
            </div>
        </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Vehículos</div>
            <div class="card-body">
                <p class="card-text">Este módulo permite a los funcionarios reportar problemas en los <strong>vehículos</strong>. Los funcionarios deberán proporcionar información detallada y el equipo encargado del mantenimiento o soporte técnico tomará las medidas para solucionar el problema.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="/repyman/reparaciones"><i class="fa-solid fa-car-side"></i> Solicitar</a>
                <a class="btn btn-primary" href="{{route('articulos.create')}}"><i class="fa-solid fa-eye"></i> Solicitudes</a>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
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