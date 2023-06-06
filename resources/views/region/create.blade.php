@extends('adminlte::page')

@section('title', 'Ingreso de Region')

@section('content_header')
    <h1>Ingresar Region</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('region.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="REGION" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre de la region:</label>
            <input type="text" class="form-control{{ $errors->has('REGION') ? ' is-invalid' : '' }}" id="REGION" name="REGION" value="{{ old('REGION') }}" placeholder="Ej: VIII DIRECCION REGIONAL CONCEPCION" required>
            @if ($errors->has('REGION'))
                <div class="invalid-feedback">
                    {{ $errors->first('REGION') }}
                </div>
            @endif
        </div>

        <a href="{{route('region.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar region</button>
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

