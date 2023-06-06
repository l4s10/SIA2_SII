@extends('adminlte::page')

@section('title', 'Resolución delegatoria')

@section('content_header')
    <h1 class="title">Detalle resolución</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la resolución delegatoria registrada con n°')}} {{$resoluciones->ID_RESOLUCION}}</h3>
        </div>

        <div class="card-body">
            <!-- Mostrar información de la solicitud -->
            <p>N° Resolución delegatoria: {{ $resoluciones->NRO_RESOLUCION }}</p>
            <p>Fecha de ingreso: {{ date('Y-m-d', strtotime($resoluciones->FECHA)) }}</p>
            <p>Autoridad: {{ $resoluciones->AUTORIDAD }}</p>
            <p>Funcionarios delegados: {{ $resoluciones->ESTADO_SOL_VEH }}</p>
            <p>Materia asociada: {{ $resoluciones->MATERIA }}</p>
        </div>

        

        <div class="card-footer">
            <form action="{{route('resolucion.destroy',$resoluciones->ID_RESOLUCION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('resolucion.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('resolucion.edit',$resoluciones->ID_RESOLUCION)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                <button type="submit" href="{{route('resolucion.destroy',$resoluciones->ID_RESOLUCION)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
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
