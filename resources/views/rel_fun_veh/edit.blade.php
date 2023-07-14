@extends('adminlte::page')

@section('title', 'Revisar reserva')

@section('content_header')
    <h1>Revisar solicitud de reserva de vehíchulos</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('solicitud.vehiculos.update', $solicitud->ID_SOL_VEH) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                            <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ $solicitud->NOMBRE_SOLICITANTE}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                            @if ($errors->has('NOMBRE_SOLICITANTE'))
                            <div class="invalid-feedback">
                                {{ $errors->first('NOMBRE_SOLICITANTE') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                            <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT }}" placeholder="Sin puntos con guion (Ej: 12345678-9)" readonly>
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
                            <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ $solicitud->DEPTO }}" placeholder="Ej: ADMINISTRACION" readonly>
                            @if ($errors->has('DEPTO'))
                            <div class="invalid-feedback">
                                {{ $errors->first('DEPTO') }}
                            </div>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                            <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ $solicitud->EMAIL }}" placeholder="Ej: demo@demo.cl" readonly>
                            @if ($errors->has('EMAIL'))
                            <div class="invalid-feedback">
                                {{ $errors->first('EMAIL') }}
                            </div>
                            @endif
                        </div>
                    </div>
            </div>


            {{-- **ESTADO SOLICITUD --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_VEH" name="ESTADO_SOL_VEH" class="form-control">
                    <option value="INGRESADO" @if ($solicitud->ESTADO_SOL_VEH === 'INGRESADO') selected @endif>Ingresado</option>
                    <option value="SUSPENDIDO" @if ($solicitud->ESTADO_SOL_VEH === 'SUSPENDIDO') selected @endif>Suspendido</option>
                    <option value="POR AUTORIZAR" @if ($solicitud->ESTADO_SOL_VEH === 'POR AUTORIZAR') selected @endif>Por autorizar</option>
                    <option value="POR RENDIR" @if ($solicitud->ESTADO_SOL_VEH === 'POR RENDIR') selected @endif>Por rendir</option>
                    <option value="RECHAZADO" @if ($solicitud->ESTADO_SOL_VEH === 'RECHAZADO') selected @endif>Rechazado</option>
                </select>
            </div>
            {{-- *CAMPO CONDUCTOR* --}}
            <div class="mb-3">
                <label for="CONDUCTOR" class="form-label"><i class="fa-solid fa-user-plus"></i> Seleccione conductor:</label>
                <select id="CONDUCTOR" name="CONDUCTOR" class="form-control @if($errors->has('CONDUCTOR')) is-invalid @endif" required>
                    <option value="">--Seleccione un(a) conductor(a)--</option>
                    {{-- *CORRECCION DE FILTRO ARREGLADO, AHORA SOLO MUESTRA CONDUCTORES DEL MISMO DEPARTAMENTO* --}}
                    @foreach ($conductores as $conductor)
                    <option value="{{$conductor->id}}" class="" {{ $conductor->id == $solicitud->CONDUCTOR ? 'selected' : '' }}>
                        {{$conductor->NOMBRES}} {{$conductor->APELLIDOS}}
                    </option>
                @endforeach

                </select>
                @error('CONDUCTOR')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- *CAMPO MOTIVO SOLICITUD* --}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_VEH" name="MOTIVO_SOL_VEH" class="form-control @error('MOTIVO_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)" readonly autofocus>{{ $solicitud->MOTIVO_SOL_VEH }}</textarea>
                @error('MOTIVO_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="NOMBRE_OCUPANTES" class="form-label"><i class="fa-solid fa-users-line"></i> Ocupantes:</label>
                <textarea id="NOMBRE_OCUPANTES" name="NOMBRE_OCUPANTES" class="form-control @error('NOMBRE_OCUPANTES') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Nombre Nombre Apellido Apellido" readonly>@foreach ($ocupantes as $ocupante){{$ocupante->NOMBRES}} {{$ocupante->APELLIDOS}}
@endforeach</textarea>
                @error('NOMBRE_OCUPANTES')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- *COMUNAS* --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ORIGEN" class="form-label"><i class="fa-solid fa-map"></i> Comuna origen:</label>
                        <select id="ORIGEN" name="ORIGEN" class="form-control @error('ORIGEN') is-invalid @enderror" disabled>
                            <option value="" selected>--Seleccione una comuna--</option>
                            {{-- CAPTURAR COMUNAS Y MOSTRAR AQUI --}}
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->ID_COMUNA }}" {{ $solicitud->ORIGEN == $comuna->ID_COMUNA ? 'selected' : '' }}>
                                    {{ $comuna->COMUNA }}
                                </option>
                            @endforeach
                        </select>

                        @error('ORIGEN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="DESTINO" class="form-label"><i class="fa-solid fa-map-location-dot"></i> Comuna destino:</label>
                        <select id="DESTINO" name="DESTINO" class="form-control @error('DESTINO') is-invalid @enderror" disabled>
                            <option value="" selected>--Seleccione una comuna--</option>
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->ID_COMUNA }}" {{ $solicitud->DESTINO == $comuna->ID_COMUNA ? 'selected' : '' }}>
                                    {{ $comuna->COMUNA }}
                                </option>
                            @endforeach
                        </select>

                        @error('DESTINO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <label for="ID_TIPO_VEH" class="form-label"><i class="fa-solid fa-car-side"></i> Seleccione tipo de vehículo:</label>
                    <select id="ID_TIPO_VEH" name="ID_TIPO_VEH" class="form-control @error('ID_TIPO_VEH') is-invalid @enderror" required>
                        <option value="" selected>--Seleccione un tipo de vehículo--</option>

                        @foreach ($tipo_vehiculos as $tipo_vehiculo)
                            <option value="{{ $tipo_vehiculo['ID_TIPO_VEH'] }}" @if ($tipo_vehiculo['ID_TIPO_VEH'] === $solicitud->ID_TIPO_VEH) selected @endif>
                                {{ $tipo_vehiculo['TIPO_VEHICULO'] }}
                            </option>
                        @endforeach
                    </select>

                    @error('ID_TIPO_VEH')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-car-on"></i> Asignar vehículos:</label>
                    <select id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" class="form-control @if($errors->has('PATENTE_VEHICULO')) is-invalid @endif">
                        <option value="">-- Seleccione el vehículo a asignar --</option>
                        @foreach ($vehiculos->groupBy('ubicacion.UBICACION') as $ubicacion => $autos)
                            <optgroup label="{{ $ubicacion }}">
                                @foreach ($autos as $auto)
                                    <option value="{{ $auto->PATENTE_VEHICULO }}" data-tipo-vehiculo="{{ $auto->tipoVehiculo->ID_TIPO_VEH }}"
                                        @if (trim($auto->PATENTE_VEHICULO) === trim($solicitud->PATENTE_VEHICULO)) selected @endif>
                                        {{ $auto->PATENTE_VEHICULO }} ({{ $auto->tipoVehiculo->TIPO_VEHICULO }})
                                    </option>
                                @endforeach
                            </optgroup>
                        @endforeach
                    </select>
                    @if($errors->has('PATENTE_VEHICULO'))
                        <div class="invalid-feedback">{{$errors->first('PATENTE_VEHICULO')}}</div>
                    @endif
                </div>


            </div>
            <div class="row" hidden>
                <div class="col-md-6">
                    <div class="mb-3">
                        <!-- Solo acceso para conductores(nivel 1) y estado formulario por rendir(autorizado/rendir nivel 3) -->
                        <label for="KMS_INICIAL" class="form-label"><i class="fa-solid fa-caret-down"></i> Kilometraje al partir:</label>
                        <input type="number" id="KMS_INICIAL" name="KMS_INICIAL" class="form-control" placeholder="Ej: 99999" readonly value="{{$solicitud->KMS_INICIAL}}">
                        @if ($errors->has('KMS_INICIAL'))
                        <div class="invalid-feedback">
                            {{ $errors->first('KMS_INICIAL') }}
                        </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="KMS_FINAL" class="form-label"><i class="fa-solid fa-caret-up"></i> Kilometraje al finalizar:</label>
                        <input type="number" id="KMS_FINAL" name="KMS_FINAL" class="form-control" placeholder="Ej: 100000" readonly value="{{$solicitud->KMS_FINAL}}">
                        @if ($errors->has('KMS_FINAL'))
                        <div class="invalid-feedback">
                            {{ $errors->first('KMS_FINAL') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- *FECHA DE SALIDA SOLICITADA* --}}
            <div class="form-group mt-3">
                <label for="FECHA_SOL_VEH"><i class="fa-solid fa-calendar"></i> Fecha de inicio y término:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SOL_VEH" name="FECHA_SOL_VEH" class="form-control @if($errors->has('FECHA_SOL_VEH')) is-invalid @endif" placeholder="Ingrese la fecha" data-input disabled value="{{$solicitud->FECHA_SOL_VEH }}">
                    {{-- *HORA SOLICITADA* --}}
                    <input type="text" id="HORA_SALIDA" name="HORA_SALIDA" class="form-control flatpickr @if($errors->has('HORA_SALIDA')) is-invalid @endif" placeholder="Seleccione la hora de salida" data-input disabled value="{{ $solicitud->HORA_SALIDA }}">
                    <input type="text" id="HORA_LLEGADA" name="HORA_LLEGADA" class="form-control flatpickr @if($errors->has('HORA_LLEGADA')) is-invalid @endif" placeholder="Seleccione la hora de llegada" data-input disabled value="{{ $solicitud->HORA_LLEGADA }}">
                </div>
                @if ($errors->has('FECHA_SOL_VEH'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_VEH') }}</div>
                @endif
            </div>
            {{-- *FECHAS AUTORIZADAS* --}}
            {{-- COPIAR DE SOL_SALAS --}}
            <div class="row">
                <div class="col-md-6">
                    {{-- Fecha y hora de inicio asignadas --}}
                    <div class="form-group">
                        <label for="FECHA_SALIDA"><i class="fa-solid fa-calendar"></i> Fecha y hora de inicio asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_SALIDA" name="FECHA_SALIDA" class="form-control @error('FECHA_SALIDA') is-invalid @enderror" placeholder="Seleccione fecha y hora de inicio" required value="{{$solicitud->FECHA_SALIDA}}">
                        </div>
                        @error('FECHA_SALIDA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- **Fecha y hora de término asignadas **--}}
                    <div class="form-group">
                        <label for="FECHA_LLEGADA"><i class="fa-solid fa-calendar"></i> Fecha y hora de término asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_LLEGADA" name="FECHA_LLEGADA" class="form-control @error('FECHA_LLEGADA') is-invalid @enderror" placeholder="Seleccione fecha y hora de término" required value="{{$solicitud->FECHA_LLEGADA }}">
                        </div>
                        @error('FECHA_LLEGADA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- *MODIFICADO POR* --}}
            <div class="mb-3" hidden>
                <label for="MODIFICADO_POR_SOL_VEH" class="form-label"><i class="fa-solid fa-user"></i> Modificado por:</label>
                <input type="text" id="MODIFICADO_POR_SOL_VEH" name="MODIFICADO_POR_SOL_VEH" class="form-control{{ $errors->has('MODIFICADO_POR_SOL_VEH') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                @if ($errors->has('MODIFICADO_POR_SOL_VEH'))
                <div class="invalid-feedback">
                    {{ $errors->first('MODIFICADO_POR') }}
                </div>
                @endif
            </div>
            {{-- *OBSERVACIONES* --}}
            <div class="mb-3">
                <label for="OBSERV_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Observaciones:</label>
                <textarea id="OBSERV_SOL_VEH" name="OBSERV_SOL_VEH" class="form-control @error('OBSERV_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba sus observaciones (MÁX 1000 CARACTERES)">{{ $solicitud->OBSERV_SOL_VEH }}</textarea>
                @error('OBSERV_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('solicitud.vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="button" class="btn btn-info" onclick="resetFields()">Me equivoqué</button>
            <button type="submit" class="btn btn-primary">Enviar cambios</button>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
             // Inicializar Flatpickr para el campo de fecha y hora de inicio
             flatpickr("#FECHA_SALIDA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });

            // Inicializar Flatpickr para el campo de fecha y hora de término
            flatpickr("#FECHA_LLEGADA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });
            $('#FECHA_SOL_VEH').flatpickr({
                dateFormat: 'Y-m-d',
                altFormat: 'd-m-Y',
                altInput: true,
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                mode: "range",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_SALIDA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_LLEGADA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
        });
    </script>
    {{-- AA --}}

    {{-- *FUNCION PARA REFRESCAR DINAMICAMENTE EL FILTRO DE FUNCIONARIOS* --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var departamentosSelect = document.getElementById('departamentos');
                var ocupanteSelect = document.getElementById('ocupante');
                var agregarOcupanteBtn = document.getElementById('agregarOcupante');
                var limpiarCampoBtn = document.getElementById('limpiarCampo');
                var nombreOcupantesTextarea = document.getElementById('NOMBRE_OCUPANTES');

                // Obtener las opciones correspondientes al departamento seleccionado al cargar la página
                var usuarios = @json($ocupantes);
                var departamentoSeleccionado = departamentosSelect.value;
                var options = ocupanteSelect.options;

                // Filtrar usuarios por departamento seleccionado al cargar la página
                var usuariosFiltradosInicial = usuarios.filter(function(usuario) {
                    return usuario.ID_DEPART == departamentoSeleccionado;
                });

                // Agregar las opciones de usuarios al select de ocupantes al cargar la página
                usuariosFiltradosInicial.forEach(function(usuario) {
                    options.add(new Option(usuario.NOMBRES + ' ' + usuario.APELLIDOS, usuario.id));
                });

                departamentosSelect.addEventListener('change', function() {
                    var departamentoId = this.value;
                    var options = ocupanteSelect.options;

                    // Limpiar opciones anteriores
                    options.length = 0;
                    options.add(new Option('-- Seleccione un compañero --', ''));

                    // Filtrar usuarios por departamento seleccionado
                    var usuariosFiltrados = usuarios.filter(function(usuario) {
                        return usuario.ID_DEPART == departamentoId;
                    });

                    // Agregar las opciones de usuarios al select de ocupantes
                    usuariosFiltrados.forEach(function(usuario) {
                        options.add(new Option(usuario.NOMBRES + ' ' + usuario.APELLIDOS, usuario.id));
                    });
                });

                agregarOcupanteBtn.addEventListener('click', function() {
                    var ocupanteNombre = ocupanteSelect.options[ocupanteSelect.selectedIndex].text;
                    var departamentoNombre = departamentosSelect.options[departamentosSelect.selectedIndex].text;
                    var nombreCompleto = ocupanteNombre + ' (' + departamentoNombre + ')';
                    nombreOcupantesTextarea.value += nombreCompleto + '\n';
                });

                limpiarCampoBtn.addEventListener('click', function() {
                    nombreOcupantesTextarea.value = '';
                });
            });
        </script>
    {{-- *FUNCION PARA REFRESCAR DINAMICAMENTE LOS VEHICULOS A ASIGNAR* --}}
    <script>
        $(document).ready(function() {
            // Evento change del elemento ID_TIPO_VEH
            $('#ID_TIPO_VEH').change(function() {
                var selectedTipoVehiculo = $(this).val();
                // Guardar el valor seleccionado antes de cambiar el tipo de vehículo
                var previousPatenteVehiculo = $('#PATENTE_VEHICULO').val();

                $('#PATENTE_VEHICULO option').each(function() {
                    var tipoVehiculoOption = $(this).data('tipo-vehiculo');

                    if (tipoVehiculoOption == selectedTipoVehiculo) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Restablecer el valor seleccionado anteriormente, en lugar de simplemente restablecer a una cadena vacía
                $('#PATENTE_VEHICULO').val(previousPatenteVehiculo);
            });

            // Desencadenar el evento change al cargar la página
            $('#ID_TIPO_VEH').trigger('change');
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#ESTADO_SOL_VEH').change(function(){
                var estado = $(this).val();
                if(estado === 'POR RENDIR') {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            }).trigger('change'); // Esto va a disparar el evento de cambio al cargar la página
        });
    </script>
@stop
