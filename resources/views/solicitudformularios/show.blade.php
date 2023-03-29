@extends('adminlte::page')

@section('title', 'Detalle de Solicitud')

@section('content_header')
    <h1 class="title">Detalle de solicitud N°{{$solicitud->ID_SOL_FORM}}</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $solicitud->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $solicitud->RUT }}</p>
                <p>Departamento: {{ $solicitud->DEPTO }}</p>
                <p>Email: {{ $solicitud->EMAIL }}</p>
                <p>Estado: {{ $solicitud->ESTADO_SOL_FORM }}</p>
                <p>Fecha de ingreso: {{ $solicitud->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Pedido: {{ $solicitud->FORM_SOL}}</p>
                <p>Observaciones: {{ $solicitud->OBSERV_SOL_FORM }}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('formulariosSol.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                <a href="{{ route('formulariosSol.edit', $solicitud->ID_SOL_FORM) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
            </div>
        </div>
    </div>
@stop


@section('js')
    <!-- Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop
