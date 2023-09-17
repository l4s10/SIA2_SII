@extends('adminlte::page')

@section('title', 'Solicitud de reparación')

@section('content_header')
    <h1 class="title">Solicitud de mantenimiento vehicular</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud n°{{$solicitudReparacionVehiculo->ID_SOL_REP_VEH}}</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $solicitudReparacionVehiculo->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $solicitudReparacionVehiculo->RUT }}</p>
                <p>Departamento: {{ $solicitudReparacionVehiculo->DEPTO }}</p>
                <p>Email: {{ $solicitudReparacionVehiculo->EMAIL }}</p>
                <p>Estado: {{ $solicitudReparacionVehiculo->ESTADO_SOL_REP_VEH }}</p>
                <p>Fecha de ingreso: {{ $solicitudReparacionVehiculo->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Patente: {{ $solicitudReparacionVehiculo->PATENTE_VEHICULO}}</p>
                <p>Tipo servicio: {{ $solicitudReparacionVehiculo->tipoServicio->TIPO_SERVICIO}}</p>
                <p>Detalle de solicitud: {{ $solicitudReparacionVehiculo->DETALLE_REPARACION_REP_VEH }}</p>
                <p>Observaciones: {{ $solicitudReparacionVehiculo->OBSERV_REP_VEH ? $solicitudReparacionVehiculo->OBSERV_REP_VEH : 'No existen observaciones por ahora.' }}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('repvehiculos.index') }}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                <!-- Sólo administradores y servicios pueden revisar -->
                @role('ADMINISTRADOR|SERVICIOS')
                    <a href="{{ route('repvehiculos.edit', $solicitudReparacionVehiculo->ID_SOL_REP_VEH) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
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