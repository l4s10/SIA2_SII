@extends('adminlte::page')

@section('title', 'Editar Formulario')

@section('content_header')
    <h1>Editar formulario</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('formularios.update',$formulario->ID_FORMULARIO)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="NOMBRE_FORMULARIO" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Formulario:</label>
            <input id="NOMBRE_FORMULARIO" name="NOMBRE_FORMULARIO" type="text" class="form-control {{ $errors->has('NOMBRE_FORMULARIO') ? ' is-invalid' : '' }}" value="{{$formulario->NOMBRE_FORMULARIO}}" placeholder="Ej: 22199" tabindex="2">
            @if ($errors->has('NOMBRE_FORMULARIO'))
            <div class="invalid-feedback">
                {{ $errors->first('NOMBRE_FORMULARIO') }}
            </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="TIPO_FORMULARIO" class="form-label"><i class="fa-solid fa-file-circle-question"></i> Tipo de formulario:</label>
            <select name="TIPO_FORMULARIO" id="TIPO_FORMULARIO" class="form-control {{ $errors->has('TIPO_FORMULARIO') ? ' is-invalid' : '' }}">
                <option value="">-- SELECCIONE UN TIPO --</option>
                <option value="TIPO B" {{ $formulario->TIPO_FORMULARIO == 'TIPO B' ? 'selected' : '' }}>Tipo B</option>
                <option value="TIPO C" {{ $formulario->TIPO_FORMULARIO == 'TIPO C' ? 'selected' : '' }}>Tipo C</option>
            </select>
            @if ($errors->has('TIPO_FORMULARIO'))
            <div class="invalid-feedback">
                {{ $errors->first('TIPO_FORMULARIO') }}
            </div>
            @endif
        </div>

        <a href="{{route('formularios.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar tipo</button>
    </form>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop
