@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Solicitar Material')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Solicitud Material</h1>
@stop

@section('content')
    <!-- COLOCA AQUI EL FORMULARIO QUE CREES -->
    {!! Form::open(['url' => 'guardar-solicitud']) !!}
    <div class="form-group">
        {!! Form::label('id_solicitud', 'ID Solicitud') !!}
        {!! Form::text('id_solicitud', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('nombre_solicitante', 'Nombre del Solicitante') !!}
        {!! Form::text('nombre_solicitante', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('rut', 'RUT') !!}
        {!! Form::text('rut', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('depto', 'Departamento') !!}
        {!! Form::text('depto', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('email', 'Correo Electrónico') !!}
        {!! Form::email('email', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('tipo_mat_sol', 'Tipo de Material Solicitado') !!}
        {!! Form::text('tipo_mat_sol', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('material_sol', 'Material Solicitado') !!}
        {!! Form::text('material_sol', null, ['class' => 'form-control']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('estado_sol', 'Estado de la Solicitud') !!}
        {!! Form::select('estado_sol', ['Pendiente', 'Aprobado', 'Rechazado'], null, ['class' => 'form-control']) !!}
    </div>
    {!! Form::submit('Guardar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
    
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop