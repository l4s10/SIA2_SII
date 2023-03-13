@extends('adminlte::page')

@section('title', 'CRUD con laravel 10')

@section('content_header')
    <h1>Editar Articulo</h1>
@stop

@section('content')
    <form action="/materiales/{{$material->ID_MATERIAL}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Nombre Material</label>
            <input id="NOMBRE_MATERIAL" name="NOMBRE_MATERIAL" type="text" class="form-control{{$errors->has('NOMBRE_MATERIAL') ? ' is-invalid' : '' }}" value="{{$material->NOMBRE_MATERIAL}}">
            @if($errors->has('NOMBRE_MATERIAL'))
            <div class="invalid-feedback">
                {{$errors->first('NOMBRE_MATERIAL')}}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Tipo de material</label>
            <select id="TIPO_MATERIAL" name="TIPO_MATERIAL" class="form-control">
                @foreach($tipos as $tipo)
                    @if($material->TIPO_MATERIAL == $tipo->TIPO_MATERIAL)
                        <option value="{{$tipo->TIPO_MATERIAL}}" selected>{{$tipo->TIPO_MATERIAL}}</option>
                    @else
                        <option value="{{$tipo->TIPO_MATERIAL}}">{{$tipo->TIPO_MATERIAL}}</option>
                    @endif
                @endforeach
            </select>
        </div>
        <a href="/materiales" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop