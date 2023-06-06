@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Resolución Delegatoria')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Resolución Delegatoria</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('resolucion.update',$resoluciones->ID_RESOLUCION)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> N° Resolución:</label>
                <input id="NRO_RESOLUCION" name="NRO_RESOLUCION" type="text" class="form-control @error('NRO_RESOLUCION') is-invalid @enderror" value="{{$resoluciones->NRO_RESOLUCION}}">
                @error('NRO_RESOLUCION')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('resolucion.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar tipo</button>
        </form>
    </div>
@stop
