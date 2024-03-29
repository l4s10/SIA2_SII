@extends('adminlte::page')

@section('title', 'Solicitud de sala')

@section('content_header')
    <h1 class="title">Detalle de la solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud n°{{$solicitud->ID_SOL_SALA}}</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $solicitud->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $solicitud->RUT }}</p>
                <p>Departamento: {{ $solicitud->DEPTO }}</p>
                <p>Email: {{ $solicitud->EMAIL }}</p>
                {{-- <p>Tipo de solicitud: {{ $solicitud->categoriaSala->CATEGORIA_SALA}}</p> --}}
                <p>Estado: {{ $solicitud->ESTADO_SOL_SALA }}</p>
                <p>Fecha de ingreso: {{ $solicitud->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</p>
                @php
                    $fechas = explode(' a ', $solicitud->FECHA_SOL_SALA);
                    $fechaInicio = \Carbon\Carbon::parse($fechas[0])->format('d/m/Y');
                    $fechaFin = isset($fechas[1]) ? \Carbon\Carbon::parse($fechas[1])->format('d/m/Y') : '';
                @endphp
                <p>Fecha solicitada: {{ $fechaInicio }} a {{ $fechaFin }}  desde las {{$solicitud->HORA_SOL_SALA}} hasta las {{$solicitud->HORA_TERM_SOL_SALA}}</p>
                <p>Motivo de la solicitud: {{$solicitud->MOTIVO_SOL_SALA}}</p>
                {{-- ocultar si esta vacio (PENDIENTE) --}}
                <p> Sala asignada: {{ $solicitud->sala ? $solicitud->sala->NOMBRE_SALA : "Aún no se ha asignado sala"}}</p>
                <p>Fecha asignada: {{ $solicitud->FECHA_INICIO_ASIG_SALA ? \Carbon\Carbon::parse($solicitud->FECHA_INICIO_ASIG_SALA)->format('d/m/Y') . " hasta las " . \Carbon\Carbon::parse($solicitud->FECHA_TERM_ASIG_SALA)->format('d/m/Y') : " Aún no se ha asignado fecha"}}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('solicitud.salas.index') }}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                @role('ADMINISTRADOR|SERVICIOS')
                <a href="{{ route('solicitud.salas.edit', $solicitud->ID_SOL_SALA) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                @endrole
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
