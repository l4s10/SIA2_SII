@extends('adminlte::page')

@section('title', 'Solicitud de equipo')

@section('content_header')
    <h1 class="title">Detalle de la solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud n°{{$solicitud->ID_SOL_EQUIPOS}}</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $solicitud->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $solicitud->RUT }}</p>
                <p>Departamento: {{ $solicitud->DEPTO }}</p>
                <p>Email: {{ $solicitud->EMAIL }}</p>
                <p>Estado: {{ $solicitud->ESTADO_SOL_EQUIPO }}</p>
                <p>Fecha de ingreso: {{ $solicitud->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</p>
                <p>Fecha solicitada: {{$solicitud->FECHA_SOL_EQUIPO}} desde {{$solicitud->HORA_INICIO_SOL_EQUIPO}} hasta las {{$solicitud->HORA_TERM_SOL_EQUIPO}}</p>
                <p>Motivo de la solicitud: {{$solicitud->MOTIVO_SOL_EQUIPO}}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('solequipos.index') }}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                <a href="{{ route('solequipos.edit', $solicitud->ID_SOL_EQUIPOS) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
            </div>
        </div>
    </div>
@stop

@section('css')
{{-- styles --}}
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop
