@extends('adminlte::page')

@section('title', 'Editar comuna')

@section('content_header')
    <h1>Editar Comuna</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('comuna.update',$comuna->ID_COMUNA)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="COMUNA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre Comuna:</label>
                <input id="COMUNA" name="COMUNA" type="text" class="form-control{{$errors->has('COMUNA') ? ' is-invalid' : '' }}" value="{{$comuna->COMUNA}}">
                @if($errors->has('COMUNA'))
                <div class="invalid-feedback">
                    {{$errors->first('COMUNA')}}
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="ID_REGION" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Región asociada:</label>
                <select id="ID_REGION" name="ID_REGION" class="form-control @error('ID_REGION') is-invalid @enderror">
                    @foreach($regiones as $region)
                        @if($comuna->ID_REGION == $region->ID_REGION)
                            <option value="{{$region->ID_REGION}}" selected>{{$region->REGION}}</option>
                        @else
                            <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                        @endif
                    @endforeach
                </select>
                @error('ID_REGION')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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


