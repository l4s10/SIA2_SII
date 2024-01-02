@extends('adminlte::page')

@section('title', 'Solicitar vehiculo')

@section('content_header')
    <h1>Solicitud de Reserva de Vehíchulos</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
        <div><strong>Bienvenido Administrador:</strong> En esta pantalla usted podrá verificar las reservas de vehículos, ya programadas, en caso de mayor información, consulte al Departamento de Administración.</div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Servicio:</strong> En esta pantalla usted podrá verificar las reservas de vehículos, ya programadas, en caso de mayor información, consulte al Departamento de Administración.</div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Informatica:</strong> En esta pantalla usted podrá verificar las reservas de vehículos, ya programadas, en caso de mayor información, consulte al Departamento de Administración.</div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Juridico:</strong> En esta pantalla usted podrá verificar las reservas de vehículos, ya programadas, en caso de mayor información, consulte al Departamento de Administración.</div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Funcionario:</strong> En esta pantalla usted podrá verificar las reservas de vehículos, ya programadas, en caso de mayor información, consulte al Departamento de Administración.</div>
    </div>
    @endrole
@stop

@section('content')
    <div class="container">
        <form action="{{route('solicitud.vehiculos.store')}}" method="POST">
            @csrf
            {{-- *CAMPOS FUNCIONARIO* --}}
            <div class="row">
                    <div class="col-md-6">
                        <input type="text" name="ID_USUARIO" value="{{auth()->user()->id}}" hidden>
                        <div class="mb-3">
                            <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                            <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES }} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly required>
                            @if ($errors->has('NOMBRE_SOLICITANTE'))
                            <div class="invalid-feedback">
                                {{ $errors->first('NOMBRE_SOLICITANTE') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                            <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ auth()->user()->RUT }}" placeholder="Sin puntos con guion (Ej: 12345678-9)" readonly required>
                            @if ($errors->has('RUT'))
                            <div class="invalid-feedback">
                                {{ $errors->first('RUT') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="DEPTO" class="form-label"><i class="fa-solid fa-building-user"></i> Departamento:</label>
                            <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->ubicacion->UBICACION }}" placeholder="Ej: ADMINISTRACION" readonly required>
                            @if ($errors->has('DEPTO'))
                            <div class="invalid-feedback">
                                {{ $errors->first('DEPTO') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                            <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ auth()->user()->email }}" placeholder="Ej: demo@demo.cl" readonly required>
                            @if ($errors->has('EMAIL'))
                            <div class="invalid-feedback">
                                {{ $errors->first('EMAIL') }}
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
            {{-- !!SELECCION DE TIPO DE VEHICULO --}}
            <div class="mb-3">
                <label for="ID_TIPO_VEH" class="form-label"><i class="fa-solid fa-car-side"></i> Seleccione tipo de vehiculo:</label>
                <select id="ID_TIPO_VEH" name="ID_TIPO_VEH" class="form-control @error('ID_TIPO_VEH') is-invalid @enderror" required autofocus>
                    <option value="" selected>--Seleccione un tipo de vehículo--</option>

                    @foreach ($tipo_vehiculos as $tipo_vehiculo)
                        <option value="{{ $tipo_vehiculo['ID_TIPO_VEH'] }}">{{ $tipo_vehiculo['TIPO_VEHICULO'] }}</option>
                    @endforeach

                </select>

                @error('ID_TIPO_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- !!INDICAR LABOR A REALIZAR --}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Labor a realizar:</label>
                <textarea id="MOTIVO_SOL_VEH" name="MOTIVO_SOL_VEH" class="form-control @error('MOTIVO_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Indique la labor a realizar (MÁX 1000 CARACTERES)" required autofocus>{{ old('MOTIVO_SOL_VEH') }}</textarea>
                @error('MOTIVO_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            {{-- *ASIGNACION DE CONDUCTOR (LIMITAR AL ROL NUEVO "SOLICITANTE")* --}}
            {{-- <div class="mb-3">
                <label for="conductor" class="form-label"><i class="fa-solid fa-user"></i> Conductor:</label>
                <select id="conductor" name="CONDUCTOR" class="form-control{{ $errors->has('conductor') ? ' is-invalid' : '' }}">
                    <option value="" selected>Seleccione un conductor</option>
                    @foreach ($usuarios as $conductor)
                        @if ($conductor->ID_UBICACION === auth()->user()->ID_UBICACION)
                            <option value="{{ $conductor->id }}" data-nombres="{{ $conductor->NOMBRES }}" data-apellidos="{{ $conductor->APELLIDOS }}">{{ $conductor->NOMBRES }} {{ $conductor->APELLIDOS }}</option>
                        @endif
                    @endforeach
                </select>
                @if ($errors->has('conductor'))
                    <div class="invalid-feedback">
                        {{ $errors->first('conductor') }}
                    </div>
                @endif
            </div> --}}

            <!-- **CAMPO OCUPANTES DEL 1 AL 6 -->
            <div class="row">
                @for ($i = 1; $i <= 6; $i++)
                <div class="col-md-6 progresivo" id="ubicacion{{$i}}" @if($i == 1) style="display: block;" @endif>
                    <div class="form-group">
                        <label for="ubicaciones{{$i}}"><i class="fas fa-location-arrow"></i> Ubicación {{$i}}</label>
                        <select id="ubicaciones{{$i}}" class="ubicaciones{{$i}} form-control" @if($i == 1) required @endif> // Validar ingreso de al menos una ubicación 
                            <option value="">-- Seleccione una ubicacion --</option>
                            @foreach ($ubicacionesFiltradas as $ubicacion)
                                <option value="{{$ubicacion->ID_UBICACION}}">{{$ubicacion->UBICACION}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6 progresivo" id="ocupante{{$i}}" @if($i == 1) style="display: block;" @endif>
                    @if($i==1)
                        <div class="form-group">
                            <label for="usuarios{{$i}}"><i class="fas fa-user"></i> Ocupante {{$i}} / Conductor</label>
                            <select id="usuarios{{$i}}" class="usuarios{{$i}} form-control" name="OCUPANTE_{{$i}}" required> // Validar ingreso del primer ocupante para primera ubicación
                                <option value="">--Seleccione al ocupante n°{{$i}} --</option>
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="usuarios{{$i}}"><i class="fas fa-user"></i> Ocupante {{$i}}</label>
                            <select id="usuarios{{$i}}" class="usuarios{{$i}} form-control" name="OCUPANTE_{{$i}}">
                                <option value="">--Seleccione al ocupante n°{{$i}} --</option>
                            </select>
                        </div>
                    @endif
                </div>
                @endfor
            </div>




            {{-- *FECHA Y HORA DE SALIDA SOLICITADA* --}}
            <div class="form-group mt-3">
                <label for="FECHA_SOL_VEH"><i class="fa-solid fa-calendar"></i> Fecha de inicio y término:</label>
                <div class="input-group">
                    {{-- !!FECHAS SOLICITADAS --}}
                    <input type="text" id="FECHA_SOL_VEH" name="FECHA_SOL_VEH" class="form-control @if($errors->has('FECHA_SOL_VEH')) is-invalid @endif" placeholder="Ingrese la fecha" data-input required value="{{ old('FECHA_SOL_VEH') }}">
                    {{-- *HORA SALIDA SOLICITADA* --}}
                    <input type="text" id="HORA_SALIDA" name="HORA_SALIDA" class="form-control flatpickr @if($errors->has('HORA_SALIDA')) is-invalid @endif" placeholder="Seleccione la hora de salida" data-input required value="{{ old('HORA_SALIDA') }}">
                    {{-- *HORA LLEGADA SOLICITADA* --}}
                    <input type="text" id="HORA_LLEGADA" name="HORA_LLEGADA" class="form-control flatpickr @if($errors->has('HORA_LLEGADA')) is-invalid @endif" placeholder="Seleccione la hora de llegada" data-input required value="{{ old('HORA_LLEGADA') }}">
                    <button type="button" id="clearButton" class="btn btn-danger">Limpiar</button>
                </div>
                @if ($errors->has('FECHA_SOL_VEH'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_VEH') }}</div>
                @endif
            </div>

            {{-- !!SELECT PARA REGIONES --}}
            <div class="row">
                {{-- *SELECT PARA REGION ORIGEN* --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="REGION_ORIGEN" class="form-label"><i class="fa-solid fa-map"></i> Region origen:</label>
                        <select id="REGION_ORIGEN" name="REGION_ORIGEN" class="form-control @error('REGION_ORIGEN') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione una region--</option>
                            {{-- CAPTURAR REGIONES Y MOSTRAR AQUI --}}
                            @foreach ($regiones as $region)
                            <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                            @endforeach
                        </select>

                        @error('REGION_ORIGEN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- *SELECT PARA REGION DESTINO* --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="REGION_DESTINO" class="form-label"><i class="fa-solid fa-map-location-dot"></i> Region destino:</label>
                        <select id="REGION_DESTINO" name="REGION_DESTINO" class="form-control @error('REGION_DESTINO') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione una region--</option>
                            @foreach ($regiones as $region)
                            <option value="{{$region->ID_REGION}}">{{$region->REGION}}</option>
                            @endforeach
                        </select>

                        @error('REGION_DESTINO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- !!COMUNAS DE ORIGEN Y DESTINO --}}
            <div class="row">
                {{-- **COMUNA DE ORIGEN --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ORIGEN" class="form-label"><i class="fa-solid fa-map"></i> Comuna origen:</label>
                        <select id="ORIGEN" name="ORIGEN" class="form-control @error('ORIGEN') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione una comuna--</option>
                            {{-- CAPTURAR COMUNAS Y MOSTRAR AQUI --}}
                            @foreach ($comunas as $comuna)
                            <option value="{{$comuna->ID_COMUNA}}" data-region="{{$comuna->ID_REGION}}">{{$comuna->COMUNA}}</option>
                            @endforeach
                        </select>

                        @error('ORIGEN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                {{-- *COMUNA DE DESTINO --}}
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="DESTINO" class="form-label"><i class="fa-solid fa-map-location-dot"></i> Comuna destino:</label>
                        <select id="DESTINO" name="DESTINO" class="form-control @error('DESTINO') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione una comuna--</option>
                            @foreach ($comunas as $comuna)
                            <option value="{{$comuna->ID_COMUNA}}" data-region="{{$comuna->ID_REGION}}">{{$comuna->COMUNA}}</option>
                            @endforeach
                        </select>

                        @error('DESTINO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- !!ESTADO DE LA SOLICITUD --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_VEH" name="ESTADO_SOL_VEH" class="form-control" disabled>
                    <option value="INGRESADO" selected>🟠 Ingresado</option>
                    <option value="EN REVISION">🟡 En revisión</option>
                    <option value="ACEPTADO">🟢 Aceptado</option>
                    <option value="RECHAZADO">🔴 Rechazado</option>
                </select>
            </div>
            {{-- !!BOTONES DE ENVIO --}}
            <a href="{{route('solicitud.vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary">Enviar solicitud</button>
        </form>
</div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> --}}
    <style>
        .textarea-container {
            margin-top: 10px; /* Ajusta el valor según sea necesario */
        }
    </style>
        <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>

    <style>
        .alert1 {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #FF8C40;
            /* Color naranjo claro (RGB: 255, 214, 153) */
            color: #000000;
        }
    </style>
    <style>
        .progresivo {
          display: none;
        }
      </style>
@stop

@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    {{-- !!CONFIG FLATPICKR --}}
    <script>
         $(function () {
            // Configuración de Flatpickr para la selección de fechas y horas en la solicitud de vehículos

            // Validaciones: solo permitir solicitudes para el año actual en horario laboral,
            // a menos que la solicitud sea realizada en diciembre,
            // en cuyo caso se permitirá seleccionar un período de uso hasta enero y febrero del año siguiente.
            
            // Crear objeto que almacena la fecha y hora actual
            let today = new Date();
            // Crear variable que recibe el límite superior del calendario.
            let maxDate;
            if (today.getMonth() === 11) {
                // Si estamos en diciembre, permitir hasta febrero del año siguiente
                maxDate = new Date(today.getFullYear() + 1, 1, 28); // maxDate = año actual + 1, mes 1 (contando de 0), día 28.
            } else {
                // En cualquier otro mes, permitir hasta el último día de este año
                maxDate = new Date(today.getFullYear(), 11, 31); // maxDate = Último día del año actual
            }

            $('#FECHA_SOL_VEH').flatpickr({
                dateFormat: 'Y-m-d',
                altFormat: 'd-m-Y',
                altInput: true,
                locale: 'es',
                minDate: today,  // No permitir fechas anteriores al día actual
                maxDate: maxDate,  // Permitir fechas según las condiciones especificadas
                showClearButton: true,
                mode: "range",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            // Flatpickr para la hora de salida
            function configureTimePicker(selector) {
                $(selector).flatpickr({
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                    locale: "es",
                    placeholder: "Seleccione la hora",
                    minTime: "07:00",
                    maxTime: "19:00",
                    onReady: function (selectedDates, dateStr, instance) {
                        $('#clearButton').on('click', function () {
                            instance.clear();
                        });
                    }
                });
            }

            configureTimePicker('#HORA_SALIDA');
            configureTimePicker('#HORA_LLEGADA');

            
            });
    </script>


    <script>

        $(document).ready(function() {
            $('#conductor').change(function() {
                let conductorSeleccionado = $(this).find(":selected");
                let idConductor = conductorSeleccionado.val();
                let nombreConductor = conductorSeleccionado.data('nombres');
                let apellidosConductor = conductorSeleccionado.data('apellidos');
                if(idConductor != "") {
                    $('.usuarios1').empty().append(new Option(nombreConductor + ' ' + apellidosConductor, idConductor)).trigger('change');
                }
            });
            // Llamar a la función cuando cambien los campos relevantes
            $('#FECHA_SOL_VEH, #HORA_SALIDA, #HORA_LLEGADA').on('change', function () {
                if ($('#FECHA_SOL_VEH').val() === '' || $('#HORA_SALIDA').val() === '' || $('#HORA_LLEGADA').val() === '') {
                    // Deshabilitar el botón de enviar si algún campo no está lleno
                    $('#FECHA_SOL_VEH').attr('required', 'required');
                } else {
                    // Habilitar el botón de enviar si todos los campos están llenos
                    $('#FECHA_SOL_VEH').removeAttr('required');
                }
            });

            // Función para actualizar la validación de ocupantes al cambiar la ubicación
            function actualizarValidacionOcupante(idUbicacion, selectOcupante) {
                let ubicacionSeleccionada = $('#ubicaciones' + idUbicacion).val();
                let requerido = ubicacionSeleccionada !== '';

                if (requerido) {
                    selectOcupante.attr('required', 'required');
                } else {
                    selectOcupante.removeAttr('required');
                }
            }


            for (let i = 1; i <= 6; i++) {
                // Actualizar la lista de usuarios en base a la ubicación seleccionada
                $('.ubicaciones'+i).change(function() {
                    actualizarValidacionOcupante(i, $('#usuarios' + i)); // Validar ingreso de ocupante por ubicación ingresada
                    const ubicacionId = $(this).val();
                    if (ubicacionId) {
                        $.ajax({
                            url: '/usuarios/'+ubicacionId,
                            type: 'GET',
                            xhrFields: {
                                withCredentials: true
                            },
                            success: function(data) {
                                let select = $('.usuarios'+i);
                                select.empty();
                                select.append('<option value="">--Seleccione al ocupante n°'+i+' --</option>');
                                $.each(data, function(index, usuario) {
                                    select.append('<option value="'+usuario.id+'">'+usuario.NOMBRES+' '+usuario.APELLIDOS+'</option>');
                                });
                            }
                        });
                    } else {
                        $('.usuarios'+i).empty().append('<option value="">--Seleccione al ocupante n°'+i+' --</option>');
                    }
                });

                // Mostrar u ocultar los selectores de ubicación y ocupante en base al ocupante seleccionado
                $('.usuarios'+i).change(function() {
                    if (this.value !== "" && i < 6) {
                        $('#ubicacion'+(i+1)).show();
                        $('#ocupante'+(i+1)).show();
                    } else if (this.value === "") {
                        for (let j = i+1; j <= 6; j++) {
                            $('#ubicacion'+j).hide();
                            $('#ocupante'+j).hide();
                        }
                    }
                });
            }
        });
    </script>




    {{-- !!FUNCION PARA REFRESCAR DINAMICAMENTE LAS COMUNAS A TRAVES DE LAS REGIONES --}}
    <script>
        $(document).ready(function() {
            $('#REGION_ORIGEN, #REGION_DESTINO').change(function() {
                var regionID = $(this).val();
                var selectID = $(this).attr('id') == 'REGION_ORIGEN' ? '#ORIGEN' : '#DESTINO';
                $(selectID).val('').find('option').each(function() {
                    var $this = $(this);
                    if ($this.data('region') == regionID) {
                        $this.show();
                    } else {
                        $this.hide();
                    }
                });
            });
        });
    </script>
@stop
