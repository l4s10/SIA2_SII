@extends('adminlte::page')

@section('title', 'Editar tipo')

@section('content_header')
    <h1>Editar Tipo Material</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('tipomaterial.update',$tipo->ID_TIPO_MAT)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Nombre Tipo:</label>
                <input id="TIPO_MATERIAL" name="TIPO_MATERIAL" type="text" class="form-control @error('TIPO_MATERIAL') is-invalid @enderror" value="{{$tipo->TIPO_MATERIAL}}">
                @error('TIPO_MATERIAL')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('tipomaterial.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
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
