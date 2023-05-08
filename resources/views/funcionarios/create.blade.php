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
            {{-- *NOMBRES Y APELLIDOS* --}}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="NOMBRES">Nombres</label>
                        <input type="text" name="NOMBRES" id="NOMBRES" class="form-control @error('nombres') is-invalid @enderror" placeholder="Nombres" value="{{ old('NOMBRES') }}" required autofocus>
                        @error('NOMBRES')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="APELLIDOS">Apellidos</label>
                        <input type="text" name="APELLIDOS" id="APELLIDOS" class="form-control @error('APELLIDOS') is-invalid @enderror" placeholder="Apellidos" value="{{ old('APELLIDOS') }}" required autofocus>
                        @error('APELLIDOS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- *CORREO ELECTRONICO* --}}
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="example@sii.cl" required>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            {{-- *Contraseña y cambiar contraseña* --}}
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
            {{-- *CAMPO RUT Y DEPTO* --}}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="RUT">RUT</label>
                        <input type="text" name="RUT" id="RUT" class="form-control" placeholder="RUT" value="{{ old('RUT') }}" required>

                        @error('RUT')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="ID_DEPART">Departamento</label>
                        <select name="ID_DEPART" id="ID_DEPART" class="form-control @error('ID_DEPART') is-invalid @enderror">
                            <option value="" disabled selected>Seleccione un departamento</option>
                            @foreach($departamentos as $departamento)
                                <option value="{{ $departamento->ID_DEPART }}" {{ old('ID_DEPART') == $departamento->ID_DEPART ? 'selected' : '' }}>{{ $departamento->DEPARTAMENTO }}</option>
                            @endforeach
                        </select>
                        @error('ID_DEPART')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col">
                    {{-- Region field --}}
                    <div class="form-group">
                        <label for="region">Región</label>
                        <select name="ID_REGION" class="form-control @error('ID_REGION') is-invalid @enderror" required>
                            <option value="" disabled>Seleccione una región</option>
                            @foreach ($regiones as $region)
                                <option value="{{ $region->ID_REGION }}" {{ old('ID_REGION') == $region->ID_REGION ? 'selected' : '' }}>{{ $region->REGION }}</option>
                            @endforeach
                        </select>

                        @error('ID_REGION')
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
                        <select name="ID_UBICACION" class="form-control @error('ID_UBICACION') is-invalid @enderror" required>
                            <option value="" disabled>Seleccione una ubicación</option>
                            @foreach ($ubicaciones as $ubicacion)
                                <option value="{{ $ubicacion->ID_UBICACION }}" {{ old('ID_UBICACION') == $ubicacion->ID_UBICACION ? 'selected' : '' }}>{{ $ubicacion->UBICACION }}</option>
                            @endforeach
                        </select>

                        @error('ID_UBICACION')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col">
                    {{-- Grado field --}}
                    <div class="form-group">
                        <label for="ID_GRADO">Grado</label>
                        <select name="ID_GRADO" class="form-control @error('ID_GRADO') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione un grado</option>
                            @foreach($grados as $grado)
                                <option value="{{ $grado->ID_GRADO }}">{{ $grado->GRADO }}</option>
                            @endforeach
                        </select>

                        @error('ID_GRADO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Escalafon field --}}
                    <div class="form-group">
                        <label for="ID_ESCALAFON">Escalafon</label>
                        <select name="ID_ESCALAFON" class="form-control @error('ID_ESCALAFON') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione un escalafon</option>
                            @foreach($escalafones as $escalafon)
                                <option value="{{ $escalafon->ID_ESCALAFON }}">{{ $escalafon->ESCALAFON }}</option>
                            @endforeach
                        </select>

                        @error('ID_ESCALAFON')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- GRUPO Y CALIDAD JURIDICA --}}
            <div class="form-row">
                <div class="col">
                    {{-- Grupo field --}}
                    <div class="form-group">
                        <label for="ID_GRUPO">Grupo</label>
                        <select name="ID_GRUPO" id="ID_GRUPO" class="form-control @error('ID_GRUPO') is-invalid @enderror" required autofocus>
                            <option value="" disabled>Seleccione un grupo</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->ID_GRUPO }}" {{ old('ID_GRUPO') == $grupo->ID_GRUPO ? 'selected' : '' }}>{{ $grupo->GRUPO }}</option>
                            @endforeach
                        </select>

                        @error('ID_GRUPO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- CALIDAD JURIDICA --}}
                    <div class="form-group">
                        <label for="ID_CALIDAD_JURIDICA">Calidad Jurídica</label>
                        <select name="ID_CALIDAD_JURIDICA" id="ID_CALIDAD_JURIDICA" class="form-control @error('ID_CALIDAD_JURIDICA') is-invalid @enderror">
                            <option value="">Seleccionar</option>
                            @foreach ($calidadesJuridicas as $calidadJuridica)
                                <option value="{{ $calidadJuridica->ID_CALIDAD }}" {{ old('ID_CALIDAD_JURIDICA') == $calidadJuridica->ID_CALIDAD ? 'selected' : '' }}>{{ $calidadJuridica->CALIDAD }}</option>
                            @endforeach
                        </select>
                        @error('ID_CALIDAD_JURIDICA')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- *FECHAS* --}}
            <div class="row">
                <div class="col">
                    {{-- Fecha de nacimiento field --}}
                    <div class="form-group">
                        <label for="FECHA_NAC">Fecha de nacimiento</label>
                        <input type="date" id="FECHA_NAC" name="FECHA_NAC" class="form-control @error('FECHA_NAC') is-invalid @enderror"
                            value="{{ old('FECHA_NAC') }}" placeholder="{{ __('Fecha de Nacimiento') }}" required autofocus>

                        @error('FECHA_NAC')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Fecha de ingreso a la empresa field --}}
                    <div class="form-group">
                        <label for="FECHA_INGRESO">Fecha ingreso</label>
                        <input type="date" id="FECHA_INGRESO" name="FECHA_INGRESO" class="form-control @error('FECHA_INGRESO') is-invalid @enderror"
                            value="{{ old('FECHA_INGRESO') }}" placeholder="{{ __('Fecha de Ingreso a la Empresa') }}" required autofocus>

                        @error('FECHA_INGRESO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- *FONO Y ANEXO* --}}
            <div class="row">
                <div class="col">
                    {{-- Fono field --}}
                    <div class="form-group">
                        <label for="FONO">Fono</label>
                        <input type="text" name="FONO" class="form-control @error('FONO') is-invalid @enderror"
                            value="{{ old('FONO') }}" placeholder="{{ __('Fono') }}" required autofocus>

                        @error('FONO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    {{-- Anexo field --}}
                    <div class="form-group">
                        <label for="ANEXO">Anexo</label>
                        <input type="text" name="ANEXO" class="form-control @error('ANEXO') is-invalid @enderror"
                            value="{{ old('ANEXO') }}" placeholder="{{ __('Anexo') }}" required autofocus>

                        @error('ANEXO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">

                <div class="col">
                    {{-- Sexo field --}}
                    <div class="form-group">
                        <label for="ID_SEXO">Sexo</label>
                        <select name="ID_SEXO" class="form-control @error('ID_SEXO') is-invalid @enderror" required>
                            <option value="" disabled {{ old('ID_SEXO') ? '' : 'selected' }}>{{ __('Sexo') }}</option>
                            @foreach ($sexos as $sexo)
                                <option value="{{ $sexo->ID_SEXO }}" {{ old('ID_SEXO') == $sexo->ID_SEXO ? 'selected' : '' }}>{{ $sexo->SEXO }}</option>
                            @endforeach
                        </select>
                        @error('ID_SEXO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="col">
                    <div class="form-group">
                        <label for="role">Rol</label>
                        <select name="role" id="role" class="form-control">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
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
            $('#FECHA_NAC').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
            $('#FECHA_INGRESO').flatpickr({
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
