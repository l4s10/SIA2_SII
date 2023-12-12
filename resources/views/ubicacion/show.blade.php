@extends('adminlte::page')

@section('title', 'Ver Cargo')

@section('content_header')
    <h1 class="title">Ver Ubicacion o Departamento</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la ubicación o departamento registrado con n°')}} {{$ubicacion->ID_UBICACION}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $ubicacion->UBICACION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Dirección regional asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $ubicacion->direccion->DIRECCION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-footer">
            <form action="{{route('ubicacion.destroy',$ubicacion->ID_UBICACION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('ubicacion.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('ubicacion.edit',$ubicacion->ID_UBICACION)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                @role('ADMINISTRADOR')
                    <button type="submit" href="{{route('cargos.destroy',$ubicacion->ID_UBICACION)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
@endsection

