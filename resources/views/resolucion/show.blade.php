@extends('adminlte::page')

@section('title', 'Resolución delegatoria')

@section('content_header')
    <h1 class="title">Detalle resolución</h1>
@stop

@section('content')
<div class="container">
    <div class="card" style="background-color: #f7f7f7; border: 1px solid #ccc;">
        <div class="card-header" style="background-color: #eaeaea;">
            <h3 class="card-title" style="color: #333;">{{ __('Información de la resolución delegatoria registrada con n°')}} {{$resolucion->NRO_RESOLUCION}}</h3>
        </div>

        <div class="card-body">
            <!-- Mostrar información de la solicitud -->
            <p class="parameter"><strong>N° Resolución delegatoria:</strong></p>
            <p class="data">{{ $resolucion->NRO_RESOLUCION }}</p>

            <p class="parameter"><strong>Fecha de ingreso:</strong></p>
            <p class="data">{{ date('Y-m-d', strtotime($resolucion->FECHA)) }}</p>

            <p class="parameter"><strong>Tipo:</strong></p>
            <p class="data">{{ $resolucion->tipo->NOMBRE }}</p>

            <p class="parameter"><strong>Firmante:</strong></p>
            @if ($resolucion->ID_FIRMANTE)
                <p class="data">{{ $resolucion->firmante->CARGO }}</p>
            @else
                <p class="data"> - </p>
            @endif

            <p class="parameter"><strong>Delegado:</strong></p>
            @if ($resolucion->ID_DELEGADO)
                <p class="data">{{ $resolucion->delegado->CARGO }}</p>
            @else
                <p class="data"> - </p>
            @endif
            
            <p class="parameter"><strong>Facultad:</strong></p>
            @if ($resolucion->facultad)
                <p class="data">{{ $resolucion->facultad->NOMBRE }}</p>
            @else
                <p class="data"> - </p>
            @endif
            
            <p class="parameter"><strong>Observaciones:</strong></p>
            <p class="data">{{ $resolucion->OBSERVACIONES }}</p>

            <p class="parameter"><strong>Documento:</strong></p>
            @if ($resolucion->DOCUMENTO)
                <a href="{{ asset('storage/'.$resolucion->DOCUMENTO) }}" class="btn btn-sia-primary" target="_blank">
                    <i class="fa-solid fa-file-pdf" style="color: green;"></i> Descargar documento
                </a>
            @else
                <p class="data">Sin documento adjunto</p>
            @endif
        </div>

        <div class="card-footer" style="background-color: #eaeaea;">
            <form action="{{route('resolucion.destroy',$resolucion->ID_RESOLUCION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('resolucion.index')}}" class="btn btn-secondary" style="margin-right: 5px;"><i class="fa-solid fa-hand-point-left"></i>Volver</a>
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