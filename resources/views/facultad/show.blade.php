@extends('adminlte::page')

@section('title', 'Ver Facultad')

@section('content_header')
    <h1 class="title">Ver Facultad</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información de la Facultad registrada con n°')}} {{$facultad->NRO}}</h3>
        </div>

        <div class="card-body">
            <div class="form-group row">
                <label for="nro" class="col-sm-2 col-form-label">{{ __('Número de Facultad:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $facultad['NRO'] }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="nombre" class="col-sm-2 col-form-label">{{ __('Nombre:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $facultad['NOMBRE'] }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="contenido" class="col-sm-2 col-form-label">{{ __('Contenido:') }}</label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" rows="4" disabled>{{ $facultad['CONTENIDO'] }}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="ley_asociada" class="col-sm-2 col-form-label">{{ __('Ley asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $facultad['LEY_ASOCIADA'] }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="art_ley_asociada" class="col-sm-2 col-form-label">{{ __('Art. de ley asociada:') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $facultad['ART_LEY_ASOCIADA'] }}</p>
                </div>
            </div>

            <div class="form-group row">
                <label for="referencia_legal" class="col-sm-2 col-form-label">{{ __('Referencia Legal:') }}</label>
                <div class="col-sm-10">
                    <textarea class="form-control-plaintext" rows="4" disabled>{{ $facultad['REFERENCIA_LEGAL'] }}</textarea>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <form action="{{route('facultades.destroy',$facultad->ID_FACULTAD)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('facultades.index')}}" class="btn btn-secondary" style="margin-right: 5px;"><i class="fa-solid fa-hand-point-left"></i>Volver</a>
                <a href="{{route('facultades.edit',$facultad->ID_FACULTAD)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                <button type="submit" href="{{route('facultades.destroy',$facultad->ID_FACULTAD)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection

