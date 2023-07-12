@extends('adminlte::page')

@section('title', 'Ver Cargo')

@section('content_header')
    <h1 class="title">Ver Cargo</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información del cargo registrado con n°')}} {{$cargo->ID_CARGO}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre del cargo:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $cargo->CARGO }} </p>
                </div>
            </div>          
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Dirección regional asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $cargo->direccion->DIRECCION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-footer">
            <form action="{{route('cargos.destroy',$cargo->ID_CARGO)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('cargos.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('cargos.edit',$cargo->ID_CARGO)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                <button type="submit" href="{{route('cargos.destroy',$cargo->ID_CARGO)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection

