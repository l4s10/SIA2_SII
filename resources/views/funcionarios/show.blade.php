@extends('adminlte::page')

@section('title', 'Ver Funcionario')

@section('content_header')
    <h1 class="title">Ver Funcionario</h1>
@stop

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">{{ __('Información del funcionario n°')}} {{$funcionario->id}}</h3>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">{{ __('Nombre completo') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->NOMBRES }} {{$funcionario->APELLIDOS}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">{{ __('Correo electrónico') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->email }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="rut" class="col-sm-2 col-form-label">{{ __('RUT') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->RUT }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="region" class="col-sm-2 col-form-label">{{ __('Región') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->region->REGION }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">{{__('Depto/Ubicacion')}}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{$funcionario->ubicacion->UBICACION}}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="grupo" class="col-sm-2 col-form-label">{{ __('Grupo') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->grupo->GRUPO }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="escalafon" class="col-sm-2 col-form-label">{{ __('Escalafon') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->escalafon->ESCALAFON }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="rol" class="col-sm-2 col-form-label">{{ __('Rol') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $roles }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="cargo" class="col-sm-2 col-form-label">{{ __('Cargo') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->cargo->CARGO }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="grado" class="col-sm-2 col-form-label">{{ __('Grado') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->grado->GRADO }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_nacimiento" class="col-sm-2 col-form-label">{{ __('Fecha de nacimiento') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $fechaNacimiento }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="fecha_ingreso" class="col-sm-2 col-form-label">{{ __('Fecha de ingreso') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $fechaIngreso }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="calidad_juridica" class="col-sm-2 col-form-label">{{ __('Calidad jurídica') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->calidadJuridica->CALIDAD }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="fono" class="col-sm-2 col-form-label">{{ __('Fono') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->FONO }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="anexo" class="col-sm-2 col-form-label">{{ __('Anexo') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->ANEXO }}</p>
                </div>
            </div>
            <div class="form-group row">
                <label for="sexo" class="col-sm-2 col-form-label">{{ __('Sexo') }}</label>
                <div class="col-sm-10">
                    <p class="form-control-plaintext">{{ $funcionario->sexo->SEXO }}</p>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <form action="{{route('funcionarios.destroy',$funcionario->id)}}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{route('funcionarios.index')}}" class="btn btn-secondary">Volver</a>
                <a href="{{route('funcionarios.edit',$funcionario->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i> Modificar</a>
                @role('ADMINISTRADOR')
                    <button type="submit" href="{{route('funcionarios.destroy',$funcionario->id)}}" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Eliminar</button>
                @endrole
            </form>
        </div>
    </div>
</div>
@endsection

