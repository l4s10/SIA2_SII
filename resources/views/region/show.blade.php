@extends('adminlte::page')

@section('title', 'Ver Región')

@section('content_header')
    <h1 class="title">Ver Región</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la Región registrada con n°')}} {{$region->ID_REGION}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre de la región:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $region->REGION }} </p>
                </div>
            </div>          
        </div>
        <div class="card-footer">
            <form action="{{route('region.destroy',$region->ID_REGION)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('region.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('region.edit',$region->ID_REGION)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                @role('ADMINISTRADOR')
                <button type="submit" href="{{route('region.destroy',$region->ID_REGION)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
@endsection

