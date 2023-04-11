@extends('adminlte::page')

@section('title', 'Editar material')

@section('content_header')
    <h1>Editar Material</h1>
@stop

@section('content')
    <div class="container">
        <form action="/materiales/{{$material->ID_MATERIAL}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="NOMBRE_MATERIAL" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Nombre Material</label>
                <input id="NOMBRE_MATERIAL" name="NOMBRE_MATERIAL" type="text" class="form-control{{$errors->has('NOMBRE_MATERIAL') ? ' is-invalid' : '' }}" value="{{$material->NOMBRE_MATERIAL}}">
                @if($errors->has('NOMBRE_MATERIAL'))
                <div class="invalid-feedback">
                    {{$errors->first('NOMBRE_MATERIAL')}}
                </div>
                @endif
            </div>
            <div class="mb-3">
                <label for="ID_TIPO_MAT" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Tipo de material</label>
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
                <label for="STOCK"><i class="fa-solid fa-person-shelter"></i> Stock:</label>
                <input type="number" class="form-control" id="STOCK" name="STOCK" value="{{ old('STOCK', $material->STOCK ?? '') }}" required>
                @error('stock')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('materiales.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar material</button>
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
