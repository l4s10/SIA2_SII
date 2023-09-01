@extends('adminlte::page')

@section('title', 'Solicitud de reparación')

@section('content_header')
    <h1 class="title">Detalle de la solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud n°{{$sol_reparacion->ID_SOL_REP_VEH}}</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $sol_reparacion->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $sol_reparacion->RUT }}</p>
                <p>Departamento: {{ $sol_reparacion->DEPTO }}</p>
                <p>Email: {{ $sol_reparacion->EMAIL }}</p>
                <p>Estado: {{ $sol_reparacion->ESTADO_SOL_REP_VEH }}</p>
                <p>Fecha de ingreso: {{ $sol_reparacion->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Tipo de servicio: {{ $sol_reparacion->tipoServicio->TIPO_SERVICIO}}</p>
                <p>Pedido: {{ $sol_reparacion->DETALLE_REPARACION_REP_VEH }}</p>
                <p>Observaciones: {{ $sol_reparacion->OBSERV_REP_VEH ? $sol_reparacion->OBSERV_REP_VEH : 'Sin observaciones.'}}</p>
                <p>Revisado por: {{$sol_reparacion->MODIFICADO_POR_REP_VEH ? $sol_reparacion->MODIFICADO_POR_REP_VEH : 'La solicitud aún no ha sido revisada.'}}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{route('repvehiculos.index')}}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                @role('ADMINISTRADOR|SERVICIOS')
                    <a href="{{ route('reparaciones.edit', $sol_reparacion->ID_SOL_REP_VEH) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
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
