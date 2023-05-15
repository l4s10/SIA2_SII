@extends('adminlte::page')

@section('title', 'Editar equipo')

@section('content_header')
    <h1>Editar equipo</h1>
@stop

@section('content')
    <div class="container">
        <form action="/equipos/{{route('equipos.update',$equipo->ID_EQUIPO)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="ID_TIPO_EQUIPOS" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Tipo:</label>
                <select class="form-control @error('ID_TIPO_EQUIPOS') is-invalid @enderror" name="ID_TIPO_EQUIPOS" id="ID_TIPO_EQUIPOS">
                    <option value="" selected>--Seleccione--</option>
                    @foreach ($tipos as $tipo)
                    <option value="{{$tipo->ID_TIPO_EQUIPOS}}" {{ $tipo->ID_TIPO_EQUIPOS == $equipo->ID_TIPO_EQUIPOS ? 'selected' : '' }}>
                        {{ $tipo->TIPO_EQUIPO }}
                    </option>
                    @endforeach
                </select>
                @error('ID_TIPO_EQUIPOS')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="MARCA_EQUIPO" class="form-label"><i class="fa-solid fa-question"></i> Marca:</label>
                <input type="text" class="form-control @error('MARCA_EQUIPO') is-invalid @enderror" name="MARCA_EQUIPO" id="MARCA_EQUIPO" value="{{$equipo->MARCA_EQUIPO}}" placeholder="Ej: LENOVO" tabindex="2">
                @error('MARCA_EQUIPO')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="MODELO_EQUIPO" class="form-label"><i class="fa-solid fa-desktop"></i> Modelo:</label>
                <input type="text" class="form-control @error('MODELO_EQUIPO') is-invalid @enderror" name="MODELO_EQUIPO" id="MODELO_EQUIPO" value="{{$equipo->MODELO_EQUIPO}}" placeholder="GENERALMENTE ESTA EN LA BASE DEL EQUIPO" tabindex="2">
                @error('MODELO_EQUIPO')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>
            <div class="form-group">
                <label for="ESTADO_EQUIPO" class="form-label"><i class="fa-solid fa-file-circle-question"></i> Estado:</label>
                <select name="ESTADO_EQUIPO" id="ESTADO_EQUIPO" class="form-control @error('ESTADO_EQUIPO') is-invalid @enderror">
                    <option value="" {{ $equipo->ESTADO_EQUIPO == '' ? 'selected' : '' }}>--Seleccione--</option>
                    <option value="DISPONIBLE" {{ $equipo->ESTADO_EQUIPO == 'DISPONIBLE' ? 'selected' : '' }}>DISPONIBLE</option>
                    <option value="NO DISPONIBLE" {{ $equipo->ESTADO_EQUIPO == 'NO DISPONIBLE' ? 'selected' : '' }}>NO DISPONIBLE</option>
                </select>
                @error('ESTADO_EQUIPO')
                    <div class="invalid-feedback">{{$message}}</div>
                @enderror
            </div>

            <a href="{{route('equipos.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
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
