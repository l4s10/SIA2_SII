@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Editar Funcionario')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Editar funcionario</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('funcionarios.update', $funcionario->id) }}" method="post">
            @csrf
            @method('PUT')

            {{-- Datos de la persona --}}
            <h4>Datos de la persona</h4>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="NOMBRES">Nombres</label>
                        <input type="text" name="NOMBRES" id="NOMBRES" class="form-control @error('nombres') is-invalid @enderror" placeholder="Nombres" value="{{ $funcionario->NOMBRES }}" required autofocus>
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
                        <input type="text" name="APELLIDOS" id="APELLIDOS" class="form-control @error('APELLIDOS') is-invalid @enderror" placeholder="Apellido Paterno Apellido Materno" value="{{ $funcionario->APELLIDOS }}" required autofocus>
                        @error('APELLIDOS')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Correo electrónico --}}
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ $funcionario->email }}" placeholder="funcionario@sii.cl" required>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col">
                    <div class="form-group">
                        <label for="RUT">RUT</label>
                        <input type="text" name="RUT" id="RUT" class="form-control" placeholder="RUT (sin puntos con guión)" value="{{ $funcionario->RUT }}" required>
                        @error('RUT')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Fecha de nacimiento field --}}
                    <div class="form-group">
                        <label for="FECHA_NAC">Fecha de nacimiento</label>
                        <input type="date" id="FECHA_NAC" name="FECHA_NAC" class="form-control @error('FECHA_NAC') is-invalid @enderror"
                            value="{{ $funcionario->FECHA_NAC }}" placeholder="{{ __('Fecha de Nacimiento') }}" required autofocus>
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
                            value="{{ $funcionario->FECHA_INGRESO }}" placeholder="{{ __('Fecha de Ingreso a la Empresa') }}" required autofocus>
                        @error('FECHA_INGRESO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    {{-- Fono field --}}
                    <div class="form-group">
                        <label for="FONO">Fono</label>
                        <input type="text" name="FONO" class="form-control @error('FONO') is-invalid @enderror"
                            value="{{ $funcionario->FONO }}" placeholder="{{ __('Fono') }}" required autofocus>
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
                            value="{{ $funcionario->ANEXO }}" placeholder="{{ __('Anexo') }}" required autofocus>
                        @error('ANEXO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Sexo field --}}
            <div class="form-group">
                <label for="ID_SEXO">Sexo</label>
                <select name="ID_SEXO" class="form-control @error('ID_SEXO') is-invalid @enderror" required>
                    <option value="" disabled>Seleccione un sexo</option>
                    @foreach ($sexos as $sexo)
                        <option value="{{ $sexo->ID_SEXO }}" {{ $funcionario->ID_SEXO == $sexo->ID_SEXO ? 'selected' : '' }}>{{ $sexo->SEXO }}</option>
                    @endforeach
                </select>
                @error('ID_SEXO')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            {{-- Contraseña y confirmación de contraseña --}}
            <h4>Configuración de la cuenta</h4>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="password">Contraseña</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña (dejar en blanco si no desea cambiar)">
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
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña (dejar en blanco si no desea cambiar)">
                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- !!ROL --}}
            <div class="form-group">
                <label for="role">Rol</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $funcionario->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Ubicación --}}
            <h4>Ubicación</h4>
            <div class="row">
                <div class="col-md-4">
                    <select id="region-select" class="form-control" name="ID_REGION">
                        <option>Selecciona una región</option>
                        @foreach ($regiones as $region)
                            <option value="{{$region->ID_REGION}}" {{ $funcionario->ID_REGION == $region->ID_REGION ? 'selected' : '' }}>{{$region->REGION}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <select id="direccion-select" class="form-control" name="ID_DIRECCION">
                        <option>Selecciona una dirección regional</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select id="ubicacion-select" class="form-control" name="ID_UBICACION">
                        <option>Selecciona una ubicación</option>
                        @foreach ($ubicaciones as $ubicacion)
                            <option value="{{$ubicacion->ID_UBICACION}}" {{ $funcionario->ID_UBICACION == $ubicacion->ID_UBICACION ? 'selected' : '' }}>{{$ubicacion->UBICACION}}</option>
                        @endforeach
                    </select>
                </div>
            </div>


            {{-- !!Grupo --}}
            <div class="form-row">
                <div class="col">
                    {{-- Grupo field --}}
                    <div class="form-group">
                        <label for="ID_GRUPO">Grupo</label>
                        <select name="ID_GRUPO" id="ID_GRUPO" class="form-control @error('ID_GRUPO') is-invalid @enderror" required autofocus>
                            <option value="" disabled>Seleccione un grupo</option>
                            @foreach ($grupos as $grupo)
                                <option value="{{ $grupo->ID_GRUPO }}" {{ $funcionario->ID_GRUPO == $grupo->ID_GRUPO ? 'selected' : '' }}>{{ $grupo->GRUPO }}</option>
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
                    {{-- Calidad Jurídica --}}
                    <div class="form-group">
                        <label for="ID_CALIDAD_JURIDICA">Calidad Jurídica</label>
                        <select name="ID_CALIDAD_JURIDICA" id="ID_CALIDAD_JURIDICA" class="form-control @error('ID_CALIDAD_JURIDICA') is-invalid @enderror">
                            <option value="">Seleccionar</option>
                            @foreach ($calidadesJuridicas as $calidadJuridica)
                                <option value="{{ $calidadJuridica->ID_CALIDAD }}" {{ $funcionario->ID_CALIDAD_JURIDICA == $calidadJuridica->ID_CALIDAD ? 'selected' : '' }}>{{ $calidadJuridica->CALIDAD }}</option>
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

            {{-- Niveles --}}
            <h4>Niveles</h4>
            <div class="row">
                <div class="col">
                    {{-- Grado field --}}
                    <div class="form-group">
                        <label for="ID_GRADO">Grado</label>
                        <select name="ID_GRADO" class="form-control @error('ID_GRADO') is-invalid @enderror" required>
                            <option value="" selected disabled>Seleccione un grado</option>
                            @foreach($grados as $grado)
                                <option value="{{ $grado->ID_GRADO }}" {{ $funcionario->ID_GRADO == $grado->ID_GRADO ? 'selected' : '' }}>{{ $grado->GRADO }}</option>
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
                                <option value="{{ $escalafon->ID_ESCALAFON }}" {{ $funcionario->ID_ESCALAFON == $escalafon->ID_ESCALAFON ? 'selected' : '' }}>{{ $escalafon->ESCALAFON }}</option>
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

            <div>
                <label for="cargo">Cargo:</label>
                <select name="ID_CARGO" id="ID_CARGO" class="form-control">
                    @foreach ($cargos as $cargo)
                        <option value="{{$cargo->ID_CARGO}}" {{ $funcionario->ID_CARGO == $cargo->ID_CARGO ? 'selected' : '' }}>{{$cargo->CARGO}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <a href="{{ route('funcionarios.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-sia-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    {{-- Probando colores personalizados --}}
    <link rel="stylesheet" href="{{ asset('vendor/adminlte/dist/css/custom.css') }}">
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
    {{-- filtros de region, direccion regional y ubicacion --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#region-select').on('change', function() {
                var regionId = $(this).val();

                // Limpia los selectores de direcciones regionales y ubicaciones
                $('#direccion-select').empty();
                $('#direccion-select').append('<option>Selecciona una dirección regional</option>'); // Agrega nuevamente la opción predeterminada

                $('#ubicacion-select').empty();
                $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

                if(regionId) {
                    $.ajax({
                        url: '/get-direcciones/'+regionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#direccion-select').append('<option value="'+ value.ID_DIRECCION +'">'+ value.DIRECCION +'</option>');
                            });
                        }
                    });
                }
            });

            $('#direccion-select').on('change', function() {
                var direccionId = $(this).val();

                // Limpia el selector de ubicaciones
                $('#ubicacion-select').empty();
                $('#ubicacion-select').append('<option>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

                if(direccionId) {
                    $.ajax({
                        url: '/get-ubicaciones/'+direccionId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $.each(data, function(key, value) {
                                $('#ubicacion-select').append('<option value="'+ value.ID_UBICACION +'">'+ value.UBICACION +'</option>');
                            });
                        }
                    });
                }
            });
        });
    </script>


@endsection
