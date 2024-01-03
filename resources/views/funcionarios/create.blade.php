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

            {{-- Datos de la persona --}}
            <h4>Datos de la persona</h4>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="NOMBRES"><i class="fa-solid fa-address-card"></i> Nombres</label>
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
                        <label for="APELLIDOS"><i class="fa-solid fa-address-card"></i> Apellidos</label>
                        <input type="text" name="APELLIDOS" id="APELLIDOS" class="form-control @error('APELLIDOS') is-invalid @enderror" placeholder="Apellido Paterno Apellido Materno" value="{{ old('APELLIDOS') }}" required autofocus>
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
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="funcionario@sii.cl" required>

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
                        <input type="text" name="RUT" id="RUT" class="form-control" placeholder="RUT (sin puntos con guión)" value="{{ old('RUT') }}" required>

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
                        <label for="FECHA_INGRESO"><i class="fa-solid fa-calendar-days"></i> Fecha ingreso</label>
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

            <div class="row">
                <div class="col">
                    {{-- Fono field --}}
                    <div class="form-group">
                        <label for="FONO"><i class="fa-solid fa-phone"></i> Fono</label>
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
                        <label for="ANEXO"><i class="fa-regular fa-id-badge"></i> Anexo</label>
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

            {{-- Sexo field --}}
            <div class="form-group">
                <label for="ID_SEXO"><i class="fa-solid fa-person-half-dress"></i> Sexo</label>
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
            <br>
            {{-- Contraseña y confirmación de contraseña --}}
            <h4>Contraseña</h4>
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="password"><i class="fa-solid fa-key"></i> Contraseña</label>
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
                        <label for="password_confirmation"><i class="fa-solid fa-key"></i> Confirmar contraseña</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirmar contraseña" required>

                        @error('password_confirmation')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <br>
            {{-- !!REGION Y DIRECCION REGIONAL --}}
            <h4>Dirección Regional</h4>
            <div class="row">
                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-map-location-dot"></i> Región </label>
                    <select id="region-select" class="form-control" name="ID_REGION" required>
                        <option value="" disabled selected>Selecciona una región</option>
                        @foreach ($regiones as $region)
                            <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-location-dot"></i> Jurisdicción</label>
                    <select id="direccion-select" class="form-control" required>
                        <option value="" disabled selected>Selecciona una dirección regional</option>
                    </select>
                </div>
                
                <div class="col-md-4">
                    <label for=""><i class="fa-solid fa-street-view"></i> Ubicación/Departamento </label>
                    <select id="ubicacion-select" class="form-control" name="ID_UBICACION" required>
                        <option value="" disabled selected>Selecciona una ubicación</option>
                    </select>
                </div>
            </div>
            <br>
            {{-- !!GRUPO Y CALIDAD JURIDICA --}}
            <div class="form-row">
                <div class="col">
                    {{-- Grupo field --}}
                    <div class="form-group">
                        <label for="ID_GRUPO"><i class="fa-solid fa-user-group"></i> Grupo</label>
                        <select name="ID_GRUPO" id="ID_GRUPO" class="form-control @error('ID_GRUPO') is-invalid @enderror" required autofocus>
                            <option value="" disabled selected>Seleccione un grupo</option>
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
                    {{-- Calidad Jurídica --}}
                    <div class="form-group">
                        <label for="ID_CALIDAD_JURIDICA"><i class="fa-solid fa-pen-to-square"></i> Calidad Jurídica</label>
                        <select name="ID_CALIDAD_JURIDICA" id="ID_CALIDAD_JURIDICA" class="form-control @error('ID_CALIDAD_JURIDICA') is-invalid @enderror" required>
                            <option value="" disabled selected>Seleccionar</option>
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
            
            <br>
            {{-- Niveles --}}
            <h4>Niveles</h4>
            <div class="row">
                <div class="col">
                    {{-- Grado field --}}
                    <div class="form-group">
                        <label for="ID_GRADO"><i class="fa-solid fa-layer-group"></i> Grado</label>
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
                        <label for="ID_ESCALAFON"><i class="fa-solid fa-layer-group"></i> Escalafón</label>
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
            {{-- !!ROL --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="role"><i class="fa-solid fa-address-book"></i> Rol en sistema</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="" disabled selected>Selecciona un rol</option>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="ID_CARGO"><i class="fa-solid fa-person-circle-check"></i> Cargo</label>
                        <select name="ID_CARGO" id="ID_CARGO" class="form-control" required>
                            <option value="" disabled selected>Selecciona un cargo</option>
                            @foreach ($cargos as $cargo)
                                <option value="{{$cargo->ID_CARGO}}">{{$cargo->CARGO}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <br>
            <div class="form-group">
                <a href="{{route('funcionarios.index')}}" class="btn btn-secondary"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-sia-primary"><i class="fa-solid fa-floppy-disk"></i> Crear usuario</button>
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
    <!-- Incluir archivos JS flatpicker -->
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    {{-- !!FILTRO DINAMICO REGION, DIRECCION, UBICACION --}}
    <script type="text/javascript">
        $(document).ready(function() {
            //Select de region
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
            //Select de direccion
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



    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    {{-- !!SCRIPT DE FILTROS (SE OBTENDRA DIRECCION REGIONAL SEGUN LA REGION SELECCIONADA) --}}
    <script>
        $(document).ready(function () {
            // Configuración de Flatpickr para las fechas
            let flatpickrConfig = {
                locale: 'es',
                maxDate: "today",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
                minDate: "1940-01-01",
                maxDate: new Date(new Date().getFullYear() - 18, 11, 31).toISOString().split('T')[0],
            };

            // Validar fecha de ingreso a partir del día actual. 31 días antes para ingresos tardíos y 31 días después para ingresos futuros.
            let currentDate = new Date();
            let fechaInicio = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() - 31);
            let fechaFin = new Date(currentDate.getFullYear(), currentDate.getMonth(), currentDate.getDate() + 31);

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

@endsection
