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
                <select id="CONDUCTOR" name="CONDUCTOR" class="form-control @error('CONDUCTOR') is-invalid @enderror" required>
                    <option value="" selected>--Seleccione un(a) conductor(a)--</option>

                    @foreach ($departamentos as $departamento)
                        <optgroup label="{{ $departamento->DEPARTAMENTO }}">
                            @foreach ($conductores as $conductor)
                                @if ($conductor->departamento->DEPARTAMENTO === $departamento->DEPARTAMENTO)
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
                <label for="MOTIVO_SOL_VEHICULO" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_VEHICULO" name="MOTIVO_SOL_VEHICULO" class="form-control @error('MOTIVO_SOL_VEHICULO') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)">{{ old('MOTIVO_SOL_VEHICULO') }}</textarea>
                @error('MOTIVO_SOL_VEHICULO')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="NOMBRE_OCUPANTES" class="form-label"><i class="fa-solid fa-users-line"></i> Ocupantes:</label>
                <textarea id="NOMBRE_OCUPANTES" name="NOMBRE_OCUPANTES" class="form-control @error('NOMBRE_OCUPANTES') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Nombre Nombre Apellido Apellido">{{ old('NOMBRE_OCUPANTES') }}</textarea>
                @error('NOMBRE_OCUPANTES')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="FECHA_SALIDA_SOL_VEH"><i class="fa-solid fa-calendar"></i> Fecha de inicio y término:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SALIDA_SOL_VEH" name="FECHA_SALIDA_SOL_VEH" class="form-control @if($errors->has('FECHA_SALIDA_SOL_VEH')) is-invalid @endif" placeholder="Ingrese la fecha" data-input required value="{{ old('FECHA_SALIDA_SOL_VEH') }}">
                    {{-- *HORA SOLICITADA* --}}
                    <input type="text" id="HORA_SALIDA_SOL_VEH" name="HORA_SALIDA_SOL_VEH" class="form-control flatpickr @if($errors->has('HORA_SALIDA_SOL_VEH')) is-invalid @endif" placeholder="Seleccione la hora de salida" data-input required value="{{ old('HORA_SALIDA_SOL_VEH') }}">
                    <input type="text" id="HORA_LLEGADA_SOL_VEH" name="HORA_LLEGADA_SOL_VEH" class="form-control flatpickr @if($errors->has('HORA_LLEGADA_SOL_VEH')) is-invalid @endif" placeholder="Seleccione la hora de llegada" data-input required value="{{ old('HORA_LLEGADA_SOL_VEH') }}">
                    <button type="button" id="clearButton" class="btn btn-danger">Limpiar</button>
                </div>
                @if ($errors->has('FECHA_SOL_SALA'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_SALA') }}</div>
                @endif
            </div>

            <div class="mb-3">
                <label for="ESTADO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_VEH" name="ESTADO_SOL_VEH" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            <a href="/solequipos" class="btn btn-secondary" tabindex="5">Cancelar</a>
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
@stop
