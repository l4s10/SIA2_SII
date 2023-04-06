@extends('adminlte::page')

@section('title', 'Menú Salas y Bodegas')

@section('content_header')
    <h1>Menú Salas y Bodegas</h1>
@stop

@section('content')
<div class="container">
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
            <div class="card-header">Módulo Salas</div>
            <div class="card-body">
                <p class="card-text">El módulo de reserva de salas es una herramienta intuitiva y fácil de usar que te permite reservar salas de reuniones y espacios de trabajo con rapidez y eficacia. Con unos pocos clics, podrás ver la disponibilidad de las salas, seleccionar la que mejor se adapte a tus necesidades y hacer una reserva en cuestión de segundos. ¡Haz tu reserva de sala de manera rápida y sin complicaciones!</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary"><i class="fa-solid fa-people-roof"></i> Solicitar</a>
                <a class="btn btn-primary"><i class="fa-solid fa-eye"></i> Solicitudes</a>
            </div>
        </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Bodegas</div>
            <div class="card-body">
                <p class="card-text">Este módulo permite a los funcionarios solicitar visitas a <strong>Bodegas</strong>.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary"><i class="fa-solid fa-warehouse"></i> Solicitar</a>
                <a class="btn btn-primary"><i class="fa-solid fa-eye"></i> Solicitudes</a>
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
@stop
