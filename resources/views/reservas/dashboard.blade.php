@extends('adminlte::page')

@section('title', 'Reserva salas y bodegas')

@section('content_header')
    <h1>Menú Salas y Bodegas</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
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
            <div class="card-header">Módulo Salas</div>
            <div class="card-body">
            <p class="card-text">Este módulo permite a los funcionarios solicitar <strong>Salas</strong>. Los funcionarios deberán proporcionar información detallada y el Soporte Informático Regional, quienes se contactarán para coordinar la reserva correspondiente.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('solicitud.salas.create')}}"><i class="fa-solid fa-file-pen"></i> Solicitar</a>
                <a class="btn btn-primary" href="{{route('solicitud.salas.index')}}"><i class="fa-solid fa-eye"></i> Solicitudes</a>
            </div>
        </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Bodegas</div>
            <div class="card-body">
            <p class="card-text">Este módulo permite a los funcionarios solicitar visitas a las distintas <strong>Bodegas</strong>. Los funcionarios deberán proporcionar información detallada y el equipo del área de servicios, se contactarán para coordinar la visita.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('solicitud.bodegas.create')}}" ><i class="fa-solid fa-shop"></i></i> Solicitar</a>
                <a class="btn btn-primary" href="{{route('solicitud.bodegas.index')}}" ><i class="fa-solid fa-eye"></i> Solicitudes</a>
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
    background-color: #99CCFF; /* Color de fondo del aviso */
    color: 	#000000;
    }
    </style>
    <style>
        .alert1 {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #FF8C40;
            /* Color naranjo claro (RGB: 255, 214, 153) */
            color: #000000;
        }
    </style>
@stop

@section('js')
@stop
