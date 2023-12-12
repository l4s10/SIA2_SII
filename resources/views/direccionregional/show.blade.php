@extends('adminlte::page')

@section('title', 'Ver dirección regional')

@section('content_header')
    <h1 class="title">Ver dirección regional</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la Dirección Regional registrada con n°')}} {{$direcciones->ID_DIRECCION}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre: ') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $direcciones->DIRECCION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Región asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $direcciones->region->REGION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-footer">
            <form action="{{route('direccionregional.destroy',$direcciones->ID_DIRECCION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('direccionregional.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('direccionregional.edit',$direcciones->ID_DIRECCION)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                @role('ADMINISTRADOR')
                <button type="submit" href="{{route('direccionregional.destroy',$direcciones->ID_DIRECCION)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
@endsection

