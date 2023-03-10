@extends('adminlte::page')

@section('title', 'Ingreso de Tipos')

@section('content_header')
    <h1>Ingresar Tipos</h1>
@stop

@section('content')
    <form action="/tipomaterial" method="POST">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Nombre Tipo</label>
            <input id="TIPO_MATERIAL" name="TIPO_MATERIAL" type="text" class="form-control @error('TIPO_MATERIAL') is-invalid @enderror" value="{{old('TIPO_MATERIAL')}}" tabindex="2">
            @error('TIPO_MATERIAL')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>

        <a href="/tipomaterial" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop