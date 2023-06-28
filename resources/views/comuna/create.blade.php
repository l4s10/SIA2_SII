@extends('adminlte::page')

@section('title', 'Ingreso de Comuna')

@section('content_header')
    <h1>Ingresar Comuna</h1>
@stop

@section('content')
<div class="container">
    <form action="{{ route('comuna.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="COMUNA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre de la comuna:</label>
            <input type="text" class="form-control{{ $errors->has('COMUNA') ? ' is-invalid' : '' }}" id="COMUNA" name="COMUNA" value="{{ old('COMUNA') }}" placeholder="Ej: CONCEPCION" required>
            @if ($errors->has('COMUNA'))
                <div class="invalid-feedback">
                    {{ $errors->first('COMUNA') }}
                </div>
            @endif
        </div>

        <div class="mb-3" class="form-group">
            <label for="ID_REGION">Región asociada:</label>
            <select name="ID_REGION" id="ID_REGION" class="form-control">
                @foreach($regiones as $region)
                    <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                @endforeach
            </select>
        </div>

        <a href="{{route('comuna.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
        <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar comuna</button>
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


