@extends('adminlte::page')

@section('title', 'Solicitud de reparación')

@section('content_header')
    <h1 class="title">Detalle de la solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud n°{{$sol_reparacion->ID_REP_INM}}</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $sol_reparacion->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $sol_reparacion->RUT }}</p>
                <p>Departamento: {{ $sol_reparacion->DEPTO }}</p>
                <p>Email: {{ $sol_reparacion->EMAIL }}</p>
                <p>Estado: {{ $sol_reparacion->ESTADO_REP_INM }}</p>
                <p>Fecha de ingreso: {{ $sol_reparacion->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Area solicitada: {{ $sol_reparacion->tipo_reparacion->TIPO_REP}}</p>
                <p>Pedido: {{ $sol_reparacion->REP_SOL }}</p>
                <p>Observaciones: {{ $sol_reparacion->OBSERV_REP_INM }}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('reparaciones.index') }}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                <a href="{{ route('reparaciones.edit', $sol_reparacion->ID_REP_INM) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
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