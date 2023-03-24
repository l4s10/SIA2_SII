@extends('adminlte::page')

@section('title', 'Solicitud de reparación')

@section('content_header')
    <h1 class="title">Revisar Solicitud</h1>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la solicitud n° {{$sol_reparacion->ID_REP_INM}}</h3>
            </div>
            <div class="card-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Solicitante</th>
                            <td>{{ $sol_reparacion->NOMBRE_SOLICITANTE }}</td>
                        </tr>
                        <tr>
                            <th>Rut</th>
                            <td>{{ $sol_reparacion->RUT }}</td>
                        </tr>
                        <tr>
                            <th>Departamento</th>
                            <td>{{ $sol_reparacion->DEPTO }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $sol_reparacion->EMAIL }}</td>
                        </tr>
                        <tr>
                            <th>Tipo de reparación</th>
                            <td>{{ $sol_reparacion->tipo_reparacion->TIPO_REP }}</td>
                        </tr>
                        <tr>
                            <th>Detalle</th>
                            <td>{{ $sol_reparacion->REP_SOL }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>{{ $sol_reparacion->ESTADO_REP_INM }}</td>
                        </tr>
                        <tr>
                            <th>Observaciones</th>
                            <td>{{ $sol_reparacion->OBSERV_REP_INM }}</td>
                        </tr>
                        <tr>
                            <th>Fecha</th>
                            <td>{{ $sol_reparacion->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card-footer text-center">
                <a href="{{ URL::previous() }}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Volver</a>
                <a href="/reparaciones/{{$sol_reparacion->ID_REP_INM}}/edit" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
            </div>
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