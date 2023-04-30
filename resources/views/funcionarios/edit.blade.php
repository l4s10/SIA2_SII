@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Modificar Funcionario')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Modificar Funcionario</h1>
@stop

@section('content')
<div class="container">
    <form action="{{route('funcionarios.update',$funcionario->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Nombre completo</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre completo" value="{{ $funcionario->name }}" required autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="email">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" value="{{ $funcionario->email }}" required>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="password">{{ __('Contraseña') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                        name="password" placeholder="{{ __('Dejar en blanco para mantener la contraseña actual') }}">
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="password-confirm">{{ __('Confirmar Contraseña') }}</label>
                    <input id="password-confirm" type="password" class="form-control"
                        name="password_confirmation" placeholder="{{ __('Dejar en blanco para mantener la contraseña actual') }}">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="rut">RUT</label>
                    <input type="text" name="rut" id="rut" class="form-control" placeholder="RUT" value="{{ $funcionario->rut }}" required>

                    @error('rut')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="depto">Departamento</label>
                    <input type="text" name="depto" id="depto" class="form-control" placeholder="Departamento" value="{{ $funcionario->depto }}" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">{{-- Region field --}}
                <div class="form-group">
                    <label for="region">Región</label>
                    <input type="text" name="region" class="form-control @error('region') is-invalid @enderror"
                        value="{{ $funcionario->region }}" placeholder="{{ __('Region') }}" required autofocus>

                    @error('region')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Ubicacion field --}}
                <div class="form-group">
                    <label for="ubicacion">Ubicación</label>
                    <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                        value="{{ $funcionario->ubicacion }}" placeholder="{{ __('Ubicacion') }}" required autofocus>

                    @error('ubicacion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{-- Grupo field --}}
                <div class="form-group">
                    <label for="grupo">Grupo</label>
                    <input type="text" name="grupo" class="form-control @error('grupo') is-invalid @enderror"
                        value="{{ $funcionario->grupo }}" placeholder="{{ __('Grupo') }}" required autofocus>

                    @error('grupo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Escalafon field --}}
                <div class="form-group">
                    <label for="escalafon">Escalafon</label>
                    <input type="text" name="escalafon" class="form-control @error('escalafon') is-invalid @enderror"
                        value="{{ $funcionario->escalafon }}" placeholder="{{ __('Escalafon') }}" required autofocus>

                    @error('escalafon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        {{-- Grado field --}}
        <div class="form-group">
            <label for="grado">Grado</label>
            <input type="text" name="grado" class="form-control @error('grado') is-invalid @enderror"
                value="{{ $funcionario->grado }}" placeholder="{{ __('Grado') }}" required autofocus>

            @error('grado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="row">
            <div class="col">
                {{-- Fecha de nacimiento field --}}
                <div class="form-group">
                    <label for="fecha_nacimiento">Fecha de nacimiento</label>
                    <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                        value="{{ $funcionario->fecha_nacimiento }}" placeholder="{{ __('Fecha de Nacimiento') }}" required autofocus>

                    @error('fecha_nacimiento')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Fecha de ingreso a la empresa field --}}
                <div class="form-group">
                    <label for="fecha_ingreso">Fecha ingreso</label>
                    <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror"
                        value="{{ $funcionario->fecha_ingreso }}" placeholder="{{ __('Fecha de Ingreso a la Empresa') }}" required autofocus>

                    @error('fecha_ingreso')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Fecha de asimilación a planta field --}}
                <div class="form-group">
                    <label for="fecha_asim_planta">Fecha asim planta</label>
                    <input type="date" name="fecha_asim_planta" class="form-control @error('fecha_asim_planta') is-invalid @enderror"
                        value="{{ $funcionario->fecha_asim_planta }}" placeholder="{{ __('Fecha de Asimilación a Planta') }}" required autofocus>

                    @error('fecha_asim_planta')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{-- Funcion field --}}
                <div class="form-group">
                    <label for="funcion">Función</label>
                    <input type="text" name="funcion" class="form-control @error('funcion') is-invalid @enderror"
                        value="{{ $funcionario->funcion }}" placeholder="{{ __('Funcion') }}" required autofocus>

                    @error('funcion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Profesion field --}}
                <div class="form-group">
                    <label for="profesion">Profesión</label>
                    <input type="text" name="profesion" class="form-control @error('profesion') is-invalid @enderror"
                        value="{{ $funcionario->profesion }}" placeholder="{{ __('Profesion') }}" required autofocus>

                    @error('profesion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{-- Area field --}}
                <div class="form-group">
                    <label for="area">Area</label>
                    <input type="text" name="area" class="form-control @error('area') is-invalid @enderror"
                        value="{{ $funcionario->area }}" placeholder="{{ __('Area') }}" required autofocus>

                    @error('area')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Fono field --}}
                <div class="form-group">
                    <label for="fono">Fono</label>
                    <input type="text" name="fono" class="form-control @error('fono') is-invalid @enderror"
                        value="{{ $funcionario->fono }}" placeholder="{{ __('Fono') }}" required autofocus>

                    @error('fono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                {{-- Anexo field --}}
                <div class="form-group">
                    <label for="anexo">Anexo</label>
                    <input type="text" name="anexo" class="form-control @error('anexo') is-invalid @enderror"
                        value="{{ $funcionario->anexo }}" placeholder="{{ __('Anexo') }}" required autofocus>

                    @error('anexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col">
                {{-- Sexo field --}}
                <div class="form-group">
                    <label for="sexo">Sexo</label>
                    <select name="sexo" class="form-control @error('sexo') is-invalid @enderror" required>
                        <option value="" disabled {{ $funcionario->sexo ? '' : 'selected' }}>{{ __('Sexo') }}</option>
                        <option value="M" {{ $funcionario->sexo == 'M' ? 'selected' : '' }}>{{ __('Masculino') }}</option>
                        <option value="F" {{ $funcionario->sexo == 'F' ? 'selected' : '' }}>{{ __('Femenino') }}</option>
                    </select>

                    @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Modificar usuario</button>
        </div>
    </form>
</div>
@endsection
