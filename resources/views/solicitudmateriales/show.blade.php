@extends('adminlte::page')

@section('title', 'Detalle de Solicitud')

@section('content_header')
    <h1 class="title">Detalle de Solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $sol_material->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $sol_material->RUT }}</p>
                <p>Departamento: {{ $sol_material->DEPTO }}</p>
                <p>Email: {{ $sol_material->EMAIL }}</p>
                <p>Estado: {{ $sol_material->ESTADO_SOL }}</p>
                <p>Fecha de ingreso: {{ $sol_material->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Pedido: {{ $sol_material->MATERIAL_SOL}}</p>
                <p>Observaciones: {{ $sol_material->OBSERVACIONES }}</p>
                <p>Revisado por: {{$sol_material->MODIFICADO_POR}}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('solmaterial.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                @can('Nivel 2')
                    <a href="{{ route('solmaterial.edit', $sol_material->ID_SOLICITUD) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                @endcan
            </div>
        </div>
    </div>
@stop

@section('js')
@stop
