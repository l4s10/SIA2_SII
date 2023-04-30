@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Ingresar Funcionario')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Agregar nuevo funcionario</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('funcionarios.store')}}" method="post">
            @csrf

            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="name">Nombre completo</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Nombres y apellidos" value="{{ old('name') }}" required autofocus>

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
                        <input type="email" name="email" id="email" class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required>

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
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="password_confirmation">Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>

                        @error('password_confirmation')
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
                        <label for="rut">RUT</label>
                        <input type="text" name="rut" id="rut" class="form-control" placeholder="RUT" value="{{ old('rut') }}" required>

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
                        <input type="text" name="depto" id="depto" class="form-control" placeholder="Departamento" value="{{ old('depto') }}" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">{{-- Region field --}}
                    <div class="form-group">
                        <label for="region">Región</label>
                        <input type="text" name="region" class="form-control @error('region') is-invalid @enderror"
                            value="{{ old('region') }}" placeholder="{{ __('Region') }}" required autofocus>

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
                            value="{{ old('ubicacion') }}" placeholder="{{ __('Ubicacion') }}" required autofocus>

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
                            value="{{ old('grupo') }}" placeholder="{{ __('Grupo') }}" required autofocus>

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
                            value="{{ old('escalafon') }}" placeholder="{{ __('Escalafon') }}" required autofocus>

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
                    value="{{ old('grado') }}" placeholder="{{ __('Grado') }}" required autofocus>

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
                        <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                            value="{{ old('fecha_nacimiento') }}" placeholder="{{ __('Fecha de Nacimiento') }}" required autofocus>

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
                        <input type="date" id="fecha_ingreso" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror"
                            value="{{ old('fecha_ingreso') }}" placeholder="{{ __('Fecha de Ingreso a la Empresa') }}" required autofocus>

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
                        <input type="date" id="fecha_asim_planta" name="fecha_asim_planta" class="form-control @error('fecha_asim_planta') is-invalid @enderror"
                            value="{{ old('fecha_asim_planta') }}" placeholder="{{ __('Fecha de Asimilación a Planta') }}" required autofocus>

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
                            value="{{ old('funcion') }}" placeholder="{{ __('Funcion') }}" required autofocus>

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
                            value="{{ old('profesion') }}" placeholder="{{ __('Profesion') }}" required autofocus>

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
                            value="{{ old('area') }}" placeholder="{{ __('Area') }}" required autofocus>

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
                            value="{{ old('fono') }}" placeholder="{{ __('Fono') }}" required autofocus>

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
                            value="{{ old('anexo') }}" placeholder="{{ __('Anexo') }}" required autofocus>

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
                            <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>{{ __('Sexo') }}</option>
                            <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>{{ __('Masculino') }}</option>
                            <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>{{ __('Femenino') }}</option>
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
                <label for="role">Rol</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-sia-primary">Crear usuario</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- Probando colores personalizados --}}
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/custom.css')}}">
@endsection

@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            $('#fecha_nacimiento').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
            $('#fecha_ingreso').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
            $('#fecha_asim_planta').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
        });
    </script>
@endsection
