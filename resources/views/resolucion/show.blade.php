@extends('adminlte::page')

@section('title', 'Resolución delegatoria')

@section('content_header')
    <h1 class="title">Detalle resolución</h1>
@stop

@section('content')
<div class="container">
    <div class="card" style="background-color: #f7f7f7; border: 1px solid #ccc;">
        <div class="card-header" style="background-color: #eaeaea;">
            <h3 class="card-title" style="color: #333;">{{ __('Información de la resolución delegatoria registrada con n°')}} {{$resolucion->ID_RESOLUCION}}</h3>
        </div>

        <div class="card-body">
            <!-- Mostrar información de la solicitud -->
            <p class="parameter"><strong>N° Resolución delegatoria:</strong></p>
            <p class="data">{{ $resolucion->NRO_RESOLUCION }}</p>

            <p class="parameter"><strong>Fecha de ingreso:</strong></p>
            <p class="data">{{ date('Y-m-d', strtotime($resolucion->FECHA)) }}</p>

            <p class="parameter"><strong>Autoridad:</strong></p>
            <p class="data">{{ $resolucion->AUTORIDAD }}</p>

            <p class="parameter"><strong>Funcionarios delegados:</strong></p>
            @if ($resolucion->FUNCIONARIOS_DELEGADOS)
                <p class="data">{{ $resolucion->FUNCIONARIOS_DELEGADOS }}</p>
            @else
                <p class="data"> - </p>
            @endif

            <p class="parameter"><strong>Materia asociada:</strong></p>
            @if ($resolucion->MATERIA)
                <p class="data">{{ $resolucion->MATERIA }}</p>
            @else
                <p class="data"> - </p>
            @endif
        </div>

        <div class="card-footer" style="background-color: #eaeaea;">
            <form action="{{route('resolucion.destroy',$resolucion->ID_RESOLUCION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('resolucion.index')}}" class="btn btn-secondary" style="margin-right: 5px;">Volver</a>
                <a href="{{route('resolucion.edit',$resolucion->ID_RESOLUCION)}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                <button type="submit" href="{{route('resolucion.destroy',$resolucion->ID_RESOLUCION)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
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