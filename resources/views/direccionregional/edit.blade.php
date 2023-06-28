@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar dirección regional')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar dirección regional</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('direccionregional.update',$direcciones->ID_DIRECCION)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="DIRECCION">Nombre dirección regional:</label>
                    <input type="text" name="DIRECCION" id="DIRECCION" class="form-control" placeholder="Nombre de la dirección regional" value="{{ $direcciones->DIRECCION }}" required autofocus>

                    @error('DIRECCION')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="ID_REGION" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Región asociada:</label>
                    <select id="ID_REGION" name="ID_REGION" class="form-control @error('ID_REGION') is-invalid @enderror">
                        @foreach($regiones as $region)
                            @if($direcciones->ID_REGION == $region->ID_REGION)
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
                
            </div>
        </div>
        <div class="form-group">
            <a href="{{route('direccionregional.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
            <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
        </div>
    </form>
</div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
@stop