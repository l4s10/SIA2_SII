@extends('adminlte::page')

@section('title', 'Ver Comuna')

@section('content_header')
    <h1 class="title">Ver Comuna</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la Comuna registrada con n°')}} {{$comuna->ID_COMUNA}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre de la comuna:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $comuna->COMUNA }} </p>
                </div>
            </div>          
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Región asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $comuna->regionAsociada->REGION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-footer">
            <form action="{{route('comuna.destroy',$comuna->ID_COMUNA)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('comuna.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('comuna.edit',$comuna->ID_COMUNA)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                @role('ADMINISTRADOR')
                <button type="submit" href="{{route('comuna.destroy',$comuna->ID_COMUNA)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
@endsection

