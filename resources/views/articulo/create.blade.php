@extends('adminlte::page')

@section('title', 'CRUD con laravel 10')

@section('content_header')
    <h1>Crear Artículo</h1>
@stop

@section('content')
    <form action="/articulos" method="POST">
        @csrf
        <div class="mb-3">
            <label for="codigo" class="form-label">Código</label>
            <input id="codigo" name="codigo" type="text" class="form-control @error('codigo') is-invalid @enderror" tabindex="1">
            @error('codigo')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <input id="descripcion" name="descripcion" type="text" class="form-control @error('descripcion') is-invalid @enderror" tabindex="2">
            @error('descripcion')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input id="cantidad" name="cantidad" type="number" class="form-control @error('cantidad') is-invalid @enderror" tabindex="3">
            @error('cantidad')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input id="precio" name="precio" type="number" step="any" value="0.00" class="form-control @error('precio') is-invalid @enderror" tabindex="4">
            @error('precio')
                <span class="invalid-feedback">{{ $message }}</span>
            @enderror
        </div>
        <a href="/articulos" class="btn btn-secondary" tabindex="5">Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop