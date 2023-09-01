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
                <div class="row">
                    <div class="col-md-6">
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

                    <div class="col-md-6">
                        <label for="TIPO_MOVIMIENTO" class="form-label">Tipo de movimiento: </label>
                        <select name="TIPO_MOVIMIENTO" id="TIPO_MOVIMIENTO" class="form-control @error('TIPO_MOVIMIENTO') is-invalid @enderror">
                            <option value="">-- Seleccione un tipo de movimiento --</option>
                            <option value="INGRESO" {{ old('TIPO_MOVIMIENTO') == 'INGRESO' ? 'selected' : '' }}>INGRESO</option>
                            <option value="TRASLADO" {{ old('TIPO_MOVIMIENTO') == 'TRASLADO' ? 'selected' : '' }}>EGRESO/DESPACHO</option>
                            <option value="MERMA" {{ old('TIPO_MOVIMIENTO') == 'MERMA' ? 'selected' : '' }}>TRASLADO</option>
                            <option value="OTRO" {{ old('TIPO_MOVIMIENTO') == 'OTRO' ? 'selected' : '' }}>PERDIDA/MERMA</option>
                        </select>
                        @error('TIPO_MOVIMIENTO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                {{-- En backend se guardara tambien como stock previo --}}
                <div class="row">
                    <div class="col-md-6">
                        <label for="STOCK"><i class="fa-solid fa-person-shelter"></i> Stock actual:</label>
                        <input type="number" class="form-control" id="STOCK" name="STOCK" value="{{ old('STOCK', $material->STOCK ?? '') }}" readonly>
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="STOCK_NUEVO"><i class="fa-solid fa-person-shelter"></i> Stock nuevo:</label>
                        <input type="number" class="form-control" id="STOCK_NUEVO" name="STOCK_NUEVO" value="{{ old('STOCK_NUEVO', $material->STOCK_NUEVO ?? '') }}" required placeholder="Indicar la nueva cantidad total">
                        @error('stock')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="DETALLE_MOVIMIENTO">Detalle del Movimiento</label>
                    <textarea class="form-control{{ $errors->has('DETALLE_MOVIMIENTO') ? ' is-invalid' : '' }}" name="DETALLE_MOVIMIENTO" id="DETALLE_MOVIMIENTO" cols="30" rows="5" placeholder="Indique el motivo y detalle del movimiento (MAX 1000 CARACTERES)">{{ old('DETALLE_MOVIMIENTO') }}</textarea>
                    @if ($errors->has('DETALLE_MOVIMIENTO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('DETALLE_MOVIMIENTO') }}
                        </div>
                    @endif
                </div>
            </div>


            <div class="mb-3">
                <label for="ID_DIRECCION" class="form-label"><i class="fa-solid fa-person-chalkboard"></i> Direccion Regional:</label>
                <select id="ID_DIRECCION" name="ID_DIRECCION" class="form-control" disabled>
                    <option value="{{$tipo->ID_DIRECCION}}" selected>{{$material->direccionRegional->DIRECCION}}</option>
                </select>
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
