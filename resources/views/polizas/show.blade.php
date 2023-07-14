{{-- show.blade.php --}}
@extends('adminlte::page')

@section('title', 'Resolución delegatoria')

@section('content_header')
    <h1 class="title">Detalle de póliza</h1>
@stop

@section('content')
<div class="container">
    <div class="card" style="background-color: #f7f7f7; border: 1px solid #ccc;">
        <div class="card-header" style="background-color: #eaeaea;">
            <h3 class="card-title" style="color: #333;">{{ __('Información de la póliza registrada con n°')}} {{$poliza->ID_POLIZA}}</h3>
        </div>

        <div class="card-body">
            <!-- Mostrar información de la solicitud -->
            <p class="parameter"><strong>N° Póliza:</strong></p>
            <p class="data">{{ $poliza->NRO_POLIZA }}</p>

            <p class="parameter"><strong>Vencimiento licencia de conducir:</strong></p>
            <p class="data">{{ date('d/m/Y', strtotime($poliza->FECHA_VENCIMIENTO_LICENCIA )) }}</p>

            <p class="parameter"><strong>Conductor:</strong></p>
            <p class="data">{{ $poliza->user->NOMBRES }} {{ $poliza->user->APELLIDOS }}</p>
        </div>

        <div class="card-footer" style="background-color: #eaeaea;">
            <form action="{{route('polizas.destroy',$poliza->ID_POLIZA)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('polizas.index')}}" class="btn btn-secondary" style="margin-right: 5px;">Volver</a>
                <a href="{{route('polizas.edit',$poliza->ID_POLIZA)}}" class="btn btn-primary" style="margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                <button type="submit" href="{{route('polizas.destroy',$poliza->ID_POLIZA)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
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
