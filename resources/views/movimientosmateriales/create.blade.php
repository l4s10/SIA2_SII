<!-- resources/views/movimiento/create.blade.php -->
@extends('adminlte::page')

@section('title', 'Movimiento de material')

@section('content')
<div class="container">
    <form method="POST" action="{{ route('gestionarMaterial.store') }}">
        @csrf

        <select name="ID_MATERIAL">
            @foreach($materiales as $material)
                <option value="{{ $material->ID_MATERIAL }}">{{ $material->NOMBRE_MATERIAL }} {{ $material->STOCK}}</option>
            @endforeach
        </select>
        <input type="text" name="ID_MODIFICANTE" value="{{auth()->user()->id}}" hidden>
        <input type="text" name="TIPO_MOVIMIENTO" placeholder="Tipo Movimiento">
        <input type="number" name="STOCK_NUEVO" placeholder="Stock Nuevo">
        <input type="datetime-local" name="FECHA_PROGRAMADA" placeholder="Fecha Programada" hidden>

        <button type="submit">Guardar</button>
    </form>
@endsection
