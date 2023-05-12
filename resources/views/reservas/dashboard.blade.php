@extends('adminlte::page')

@section('title', 'Reserva salas y bodegas')

@section('content_header')
    <h1>Menú Salas y Bodegas</h1>
    <div class="alert alert-info" role="alert">
    <div> <strong>Bienvenido Encargado de Informatica:</strong> El calendario presente muestra las fechas en donde se encuentran reservadas las Salas y Equipos para una mejor informacion de la disponibilidad de estos.<div>
    </div>
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
            <p class="card-text">Este módulo permite a los funcionarios solicitar <strong>Salas</strong>. Los funcionarios deberán proporcionar información detallada y el equipo encargado del soporte de salas te dara soporte técnico para llevar tu solicitud a realizarce.</p>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary" href="{{route('solicitud.salas.create')}}"><i class="fa-solid fa-file-pen"></i> Solicitar</a>
                <a class="btn btn-primary" href="{{route('solicitud.salas.index')}}"><i class="fa-solid fa-eye"></i> Solicitudes</a>
            </div>
        </div>
        <div class="card text-bg-primary mb-3 mx-auto col-sm-12 col-md-6" style="max-width: 100%; text-align: justify;">
            <div class="card-header">Módulo Bodegas</div>
            <div class="card-body">
            <p class="card-text">Este módulo permite a los funcionarios solicitar <strong>Bodegas</strong>. Los funcionarios deberán proporcionar información detallada y el equipo encargado del soporte de bodegas te dara técnico para llevar tu solicitud a realizarce.</p>
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
@stop

@section('js')
@stop
