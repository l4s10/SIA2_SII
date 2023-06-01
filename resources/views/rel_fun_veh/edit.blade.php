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
                        <input type="text" name="ID_USUARIO" value="{{$solicitud->ID_USUARIO}}" hidden>
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
                            <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ auth()->user()->email }}" placeholder="Ej: demo@demo.cl" readonly>
                            @if ($errors->has('EMAIL'))
                            <div class="invalid-feedback">
                                {{ $errors->first('EMAIL') }}
                            </div>
                            @endif
                        </div>
                    </div>
            </div>
            <div class="mb-3">
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

            {{-- *CAMPO CONDUCTOR* --}}
            <div class="mb-3">
                <label for="CONDUCTOR" class="form-label"><i class="fa-solid fa-user-plus"></i> Seleccione conductor:</label>
                <select id="CONDUCTOR" name="CONDUCTOR" class="form-control @if($errors->has('CONDUCTOR')) is-invalid @endif" required>
                    <option value="">--Seleccione un(a) conductor(a)--</option>
                    {{-- *CORRECCION DE FILTRO ARREGLADO, AHORA SOLO MUESTRA CONDUCTORES DEL MISMO DEPARTAMENTO* --}}
                    @foreach ($departamentos as $departamento)
                        <optgroup label="{{ $departamento->DEPARTAMENTO }}">
                            @foreach ($conductores as $conductor)
                                @php
                                    $usuario = App\Models\User::find($solicitud->ID_USUARIO);
                                @endphp
                                @if ($conductor->departamento->DEPARTAMENTO === $departamento->DEPARTAMENTO && $conductor->departamento->ID_DEPART === $usuario->departamento->ID_DEPART)
                                    <option value="{{ $conductor->id }}" @if ($conductor->id == $solicitud->CONDUCTOR) selected @endif>
                                        {{ $conductor->NOMBRES }} {{ $conductor->APELLIDOS }}
                                    </option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>


                @error('CONDUCTOR')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>


            <div class="mb-3">
                <label for="MOTIVO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_VEH" name="MOTIVO_SOL_VEH" class="form-control @error('MOTIVO_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)">{{ $solicitud->MOTIVO_SOL_VEH }}</textarea>
                @error('MOTIVO_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="NOMBRE_OCUPANTES" class="form-label"><i class="fa-solid fa-users-line"></i> Ocupantes:</label>
                <textarea id="NOMBRE_OCUPANTES" name="NOMBRE_OCUPANTES" class="form-control @error('NOMBRE_OCUPANTES') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Nombre Nombre Apellido Apellido">{{ $solicitud->NOMBRE_OCUPANTES }}</textarea>
                @error('NOMBRE_OCUPANTES')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- *FECHAS SOLICITADAS* --}}
            <div class="form-group">
                <label for="FECHA_SALIDA_SOL_VEH"><i class="fa-solid fa-calendar"></i> Fecha de inicio y término:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SALIDA_SOL_VEH" name="FECHA_SALIDA_SOL_VEH" class="form-control @if($errors->has('FECHA_SALIDA_SOL_VEH')) is-invalid @endif" placeholder="Ingrese la fecha" data-input required value="{{ $solicitud->FECHA_SALIDA_SOL_VEH }}">
                    {{-- *HORA SOLICITADA* --}}
                    <input type="text" id="HORA_SALIDA_SOL_VEH" name="HORA_SALIDA_SOL_VEH" class="form-control flatpickr @if($errors->has('HORA_SALIDA_SOL_VEH')) is-invalid @endif" placeholder="Seleccione la hora de salida" data-input required value="{{ $solicitud->HORA_SALIDA_SOL_VEH }}">
                    <input type="text" id="HORA_LLEGADA_SOL_VEH" name="HORA_LLEGADA_SOL_VEH" class="form-control flatpickr @if($errors->has('HORA_LLEGADA_SOL_VEH')) is-invalid @endif" placeholder="Seleccione la hora de llegada" data-input required value="{{ $solicitud->HORA_LLEGADA_SOL_VEH }}">
                    <button type="button" id="clearButton" class="btn btn-danger">Limpiar</button>
                </div>
                @if ($errors->has('FECHA_SOL_SALA'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_SALA') }}</div>
                @endif
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
            <div class="mb-3">
                <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-car-on"></i> Asignar vehiculos:</label>
                <select id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" class="form-control @if($errors->has('PATENTE_VEHICULO')) is-invalid @endif">
                    <option value="">-- Seleccione el vehículo a asignar --</option>
                    @foreach ($vehiculos->groupBy('UNIDAD_VEHICULO') as $grupo => $autos)
                        <optgroup label="{{ $grupo }}">
                            @foreach ($autos as $auto)
                                @if ($auto->tipoVehiculo->ID_TIPO_VEH === $solicitud->ID_TIPO_VEH)
                                    <option value="{{ $auto->PATENTE_VEHICULO }}" @if ($auto->PATENTE_VEHICULO === $solicitud->PATENTE_VEHICULO) selected @endif>
                                        {{ $auto->PATENTE_VEHICULO }} ({{ $auto->tipoVehiculo->TIPO_VEHICULO }})
                                    </option>
                                @endif
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                @if($errors->has('PATENTE_VEHICULO'))
                    <div class="invalid-feedback">{{$errors->first('PATENTE_VEHICULO')}}</div>
                @endif
            </div>
            {{-- **ESTADO SOLICITUD --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_VEH" name="ESTADO_SOL_VEH" class="form-control">
                    <option value="INGRESADO" @if ($solicitud->ESTADO_SOL_VEH === 'INGRESADO') selected @endif>Ingresado</option>
                    <option value="EN REVISION" @if ($solicitud->ESTADO_SOL_VEH === 'EN REVISION') selected @endif>En revisión</option>
                    <option value="ACEPTADO" @if ($solicitud->ESTADO_SOL_VEH === 'ACEPTADO') selected @endif>Aceptado</option>
                    <option value="RECHAZADO" @if ($solicitud->ESTADO_SOL_VEH === 'RECHAZADO') selected @endif>Rechazado</option>
                </select>
            </div>
            <a href="{{route('solicitud.vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary">Enviar solicitud</button>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            $('#FECHA_SALIDA_SOL_VEH').flatpickr({
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
            $('#HORA_SALIDA_SOL_VEH').flatpickr({
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
            $('#HORA_LLEGADA_SOL_VEH').flatpickr({
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
    {{-- *VEHICULOS CON REFRESCADO DINAMICO* --}}

    {{-- *FUNCION PARA REFRESCAR DINAMICAMENTE EL FILTRO DE FUNCIONARIOS* --}}
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var departamentosSelect = document.getElementById('departamentos');
                var ocupanteSelect = document.getElementById('ocupante');
                var agregarOcupanteBtn = document.getElementById('agregarOcupante');
                var limpiarCampoBtn = document.getElementById('limpiarCampo');
                var nombreOcupantesTextarea = document.getElementById('NOMBRE_OCUPANTES');

                // Obtener las opciones correspondientes al departamento seleccionado al cargar la página
                var usuarios = @json($conductores);
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

@stop
