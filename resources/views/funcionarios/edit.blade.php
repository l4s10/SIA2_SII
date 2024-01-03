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
                        <label for="NOMBRES"><i class="fa-solid fa-address-card"></i> Nombres</label>
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
                        <label for="APELLIDOS"><i class="fa-solid fa-address-card"></i> Apellidos</label>
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
                        <label for="email"><i class="fa-solid fa-envelope"></i> Email</label>
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
                        <label for="RUT"><i class="fa-solid fa-id-card"></i> RUT</label>
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
                        <label for="FECHA_NAC"><i class="fa-solid fa-calendar-days"></i> Fecha de nacimiento</label>
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
                        <label for="FECHA_INGRESO"><i class="fa-solid fa-calendar-days"></i> Fecha ingreso</label>
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
                        <label for="FONO"><i class="fa-solid fa-phone"></i> Fono</label>
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
                        <label for="ANEXO"><i class="fa-regular fa-id-badge"></i> Anexo</label>
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
                <label for="ID_SEXO"><i class="fa-solid fa-person-half-dress"></i> Sexo</label>
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
            <br>
            {{-- Contraseña y confirmación de contraseña --}}
            <h4>Configuración de la cuenta</h4>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="password"><i class="fa-solid fa-key"></i> Contraseña</label>
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
                        <label for="password_confirmation"><i class="fa-solid fa-key"></i> Confirmar contraseña</label>
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
                <label for="role"><i class="fa-solid fa-address-book"></i> Rol en sistema</label>
                <select name="role" id="role" class="form-control">
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}" {{ $funcionario->hasRole($role->name) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>

            {{-- Ubicación --}}
            <h4>Ubicación</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-map-location-dot"></i> Región </label>
                    <select id="region-select" class="form-control" name="ID_REGION" required>
                        <option value="" >Selecciona una región</option>
                        @foreach ($regiones as $region)
                            <option value="{{ $region->ID_REGION }}" {{ $funcionario->ID_REGION == $region->ID_REGION ? 'selected' : '' }}>{{ $region->REGION }}</option>
                        @endforeach
                    </select>
                </div>
            
                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-location-dot"></i> Jurisdicción</label>
                    <select id="direccion-select" class="form-control" name="ID_DIRECCION" required>
                        <option value="" >Selecciona una dirección regional</option>
                        @if($funcionario->ubicacion && $funcionario->ubicacion->direccion)
                            <option value="{{ $funcionario->ubicacion->direccion->ID_DIRECCION }}" selected>{{ $funcionario->ubicacion->direccion->DIRECCION }}</option>
                        @endif
                    </select>
                </div>
            
                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-street-view"></i> Ubicación/Departamento </label>
                    <select id="ubicacion-select" class="form-control" name="ID_UBICACION" required>
                        <option value="" >Selecciona una ubicación</option>
                        @foreach ($ubicaciones as $ubicacion)
                            <option value="{{ $ubicacion->ID_UBICACION }}" {{ $funcionario->ID_UBICACION == $ubicacion->ID_UBICACION ? 'selected' : '' }}>{{ $ubicacion->UBICACION }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <br>

            {{-- !!Grupo --}}
            <div class="row">
                <div class="col">
                    {{-- Grupo field --}}
                    <div class="form-group">
                        <label for="ID_GRUPO"><i class="fa-solid fa-user-group"></i> Grupo</label>
                        <select name="ID_GRUPO" id="ID_GRUPO" class="form-control @error('ID_GRUPO') is-invalid @enderror" required autofocus>
                            <option value="" >Seleccione un grupo</option>
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
                        <label for="ID_CALIDAD_JURIDICA"><i class="fa-solid fa-pen-to-square"></i> Calidad Jurídica</label>
                        <select name="ID_CALIDAD_JURIDICA" id="ID_CALIDAD_JURIDICA" class="form-control @error('ID_CALIDAD_JURIDICA') is-invalid @enderror" required autofocus>
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
            <br>
            {{-- Niveles --}}
            <h4>Niveles</h4>
            <div class="row">
                <div class="col">
                    {{-- Grado field --}}
                    <div class="form-group">
                        <label for="ID_GRADO"><i class="fa-solid fa-layer-group"></i> Grado</label>
                        <select name="ID_GRADO" class="form-control @error('ID_GRADO') is-invalid @enderror" required>
                            <option value="" selected >Seleccione un grado</option>
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
                        <label for="ID_ESCALAFON"><i class="fa-solid fa-layer-group"></i> Escalafon</label>
                        <select name="ID_ESCALAFON" class="form-control @error('ID_ESCALAFON') is-invalid @enderror" required>
                            <option value="" selected >Seleccione un escalafon</option>
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
                <label for="ID_CARGO"><i class="fa-solid fa-person-circle-check"></i> Cargo</label>
                <select name="ID_CARGO" id="ID_CARGO" class="form-control @error('ID_CARGO') is-invalid @enderror" required>
                    <option value="" selected >Seleccione un cargo</option>
                    @foreach ($cargos as $cargo)
                        <option value="{{ $cargo->ID_CARGO }}" {{ old('ID_CARGO', $funcionario->ID_CARGO) == $cargo->ID_CARGO ? 'selected' : '' }}>{{ $cargo->CARGO }}</option>
                    @endforeach
                </select>
                @error('ID_CARGO')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <br>

            <div class="form-group">
                <a href="{{route('funcionarios.index')}}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-sia-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar cambios</button>
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
            // Configuración de Flatpickr para las fechas
            let flatpickrConfig = {
                locale: 'es',
                maxDate: "today",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
                minDate: "1940-01-01",
                maxDate: new Date(new Date().getFullYear() - 18, 11, 31).toISOString().split('T')[0], // Validar 18 años - a partir del día actual, en los 12 meses (contando de 0) hasta el día 31.
            };

            // Obtener la fecha actual
            let currentDate = new Date();

            // Calcular la fecha de inicio (hoy - 1 año)
            let fechaInicio = new Date(currentDate.getFullYear() - 1, currentDate.getMonth(), currentDate.getDate());

            // Calcular la fecha de fin (hoy + 31 días)
            let fechaFin = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() + 31);

            // Configuración para Flatpickr
            let flatpickrConfig2 = {
                locale: 'es',
                minDate: fechaInicio.toISOString().split('T')[0],
                maxDate: fechaFin.toISOString().split('T')[0],
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            };

            // Inicializar Flatpickr en los campos de fecha
            $('#FECHA_NAC').flatpickr(flatpickrConfig);
            $('#FECHA_INGRESO').flatpickr(flatpickrConfig2);
        });
    </script>
    {{-- filtros de region, direccion regional y ubicacion --}}
    <script type="text/javascript">
        $(document).ready(function() {
            $('#region-select').on('change', function() {
                var regionId = $(this).val();

                // Limpia los selectores de direcciones regionales y ubicaciones
                $('#direccion-select').empty();
                $('#direccion-select').append('<option value="" disabled selected>Selecciona una dirección regional</option>'); // Agrega nuevamente la opción predeterminada

                $('#ubicacion-select').empty();
                $('#ubicacion-select').append('<option value="" disabled selected>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

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
                $('#ubicacion-select').append('<option value="" disabled selected>Selecciona una ubicación</option>'); // Agrega nuevamente la opción predeterminada

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
