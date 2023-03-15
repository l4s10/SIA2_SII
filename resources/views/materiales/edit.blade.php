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
            <label for="ID_TIPO_MAT" class="form-label">Tipo de material</label>
            <select id="ID_TIPO_MAT" name="ID_TIPO_MAT" class="form-control @error('ID_TIPO_MAT') is-invalid @enderror">
                @foreach($tipos as $tipo)
                    @if($material->ID_TIPO_MAT == $tipo->ID_TIPO_MAT)
                        <option value="{{$tipo->ID_TIPO_MAT}}" selected>{{$tipo->TIPO_MATERIAL}}</option>
                    @else
                        <option value="{{$tipo->ID_TIPO_MAT}}">{{$tipo->TIPO_MATERIAL}}</option>
                    @endif
                @endforeach
            </select>
            @error('ID_TIPO_MAT')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group">
            <label for="STOCK">Stock:</label>
            <input type="number" class="form-control" id="STOCK" name="STOCK" value="{{ old('STOCK', $material->STOCK ?? '') }}" required>
            @error('stock')
                <div class="text-danger">{{ $message }}</div>
            @enderror
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