@extends('adminlte::page')

@section('title', 'Revisar solicitud equipo')

@section('content_header')
    <h1>Revisar solicitud</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('solequipos.update',$solicitud->ID_SOL_EQUIPOS)}}" method="POST">
            @csrf
            @method('PUT')
            {{-- *CAMPOS USUARI* --}}
            <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                            <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ $solicitud->NOMBRE_SOLICITANTE }}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
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

            {{-- ESTADO SOLICITUD --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_EQUIPO" name="ESTADO_SOL_EQUIPO" class="form-control" required>
                    <option value="INGRESADO" {{ $solicitud->ESTADO_SOL_EQUIPO == 'INGRESADO' ? 'selected' : '' }}>🟠 Ingresado</option>
                    <option value="EN REVISION" {{ $solicitud->ESTADO_SOL_EQUIPO == 'EN REVISION' ? 'selected' : '' }}>🟡 En revisión</option>
                    <option value="ACEPTADO" {{ $solicitud->ESTADO_SOL_EQUIPO == 'ACEPTADO' ? 'selected' : '' }}>🟢 Aceptado</option>
                    <option value="RECHAZADO" {{ $solicitud->ESTADO_SOL_EQUIPO == 'RECHAZADO' ? 'selected' : '' }}>🔴 Rechazado</option>
                </select>
            </div>
            {{-- EQUIPOS SOLICITADOS --}}
            <div class="mb-3">
                <label for="EQUIPO_SOL" class="form-label"><i class="fa-sharp fa-solid fa-desktop"></i> Equipos solicitados:</label>
                <textarea id="EQUIPO_SOL" name="EQUIPO_SOL" class="form-control @error('EQUIPO_SOL') is-invalid @enderror" aria-label="With textarea" rows="3" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)" readonly>{{ $solicitud->EQUIPO_SOL }}</textarea>
                @error('EQUIPO_SOL')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- MOTIVO DE LA SOLICITUD --}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_EQUIPO" name="MOTIVO_SOL_EQUIPO" class="form-control @error('MOTIVO_SOL_EQUIPO') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)" readonly>{{ $solicitud->MOTIVO_SOL_EQUIPO }}</textarea>
                @error('MOTIVO_SOL_EQUIPO')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="FECHA_SOL_EQUIPO"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                <input type="text" id="FECHA_SOL_EQUIPO" name="FECHA_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('FECHA_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input readonly value=" {{($solicitud->FECHA_SOL_EQUIPO)}}">
                @if ($errors->has('FECHA_SOL_EQUIPO'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_EQUIPO') }}</div>
                @endif
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="HORA_INICIO_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Inicio:</label>
                    <input type="text" id="HORA_INICIO_SOL_EQUIPO" name="HORA_INICIO_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de inicio" data-input value="{{ $solicitud->HORA_INICIO_SOL_EQUIPO }}" readonly>
                    @if ($errors->has('HORA_INICIO_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_INICIO_SOL_EQUIPO') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="HORA_TERM_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Término:</label>
                    <input type="text" id="HORA_TERM_SOL_EQUIPO" name="HORA_TERM_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_TERM_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de término" data-input value="{{ $solicitud->HORA_TERM_SOL_EQUIPO }}" readonly>
                    @if ($errors->has('HORA_TERM_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_TERM_SOL_EQUIPO') }}</div>
                    @endif
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    {{-- Fecha y hora de inicio asignadas --}}
                    <div class="form-group">
                        <label for="FECHA_INICIO_EQUIPO"><i class="fa-solid fa-calendar"></i> Fecha y hora de inicio asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_INICIO_EQUIPO" name="FECHA_INICIO_EQUIPO" class="form-control @error('FECHA_INICIO_EQUIPO') is-invalid @enderror" placeholder="Seleccione fecha y hora de inicio" required value="{{ old('FECHA_INICIO_EQUIPO', $solicitud->FECHA_INICIO_EQUIPO) }}">
                        </div>
                        @error('FECHA_INICIO_EQUIPO')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- **Fecha y hora de término asignadas **--}}
                    <div class="form-group">
                        <label for="FECHA_FIN_EQUIPO"><i class="fa-solid fa-calendar"></i> Fecha y hora de término asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_FIN_EQUIPO" name="FECHA_FIN_EQUIPO" class="form-control @error('FECHA_FIN_EQUIPO') is-invalid @enderror" placeholder="Seleccione fecha y hora de término" required value="{{ old('FECHA_FIN_EQUIPO', $solicitud->FECHA_FIN_EQUIPO) }}">
                        </div>
                        @error('FECHA_FIN_EQUIPO')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- Observaciones --}}
            <div class="mb-3">
                <label for="OBSERV_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-pen"></i> Observaciones:</label>
                <textarea id="OBSERV_SOL_EQUIPO" name="OBSERV_SOL_EQUIPO" class="form-control @error('OBSERV_SOL_EQUIPO') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Ingrese sus observaciones (MÁX 1000 CARACTERES)">{{ $solicitud->OBSERV_SOL_EQUIPO }}</textarea>
                @error('OBSERV_SOL_EQUIPO')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Campo no es relevante para ver en user nivel 2 --}}
            <div class="mb-3" hidden>
                <label for="MODIFICADO_POR_SOL_EQUIPO" class="form-label">Modificado por:</label>
                <input type="text" id="MODIFICADO_POR_SOL_EQUIPO" name="MODIFICADO_POR_SOL_EQUIPO" class="form-control" value="{{ auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}">
            </div>

            <!-- Botones de envio -->
            <div class="mb-6">
                <a href="{{route('solequipos.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-sharp fa-solid fa-paper-plane"></i> Enviar Cambios</button>
            </div>
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <!-- CONEXION CON BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    {{-- Para actualizar dinamicamente el campo de equipo a asignar --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            flatpickr("#FECHA_SOL_EQUIPO", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y',
                altInput: true,
            });
             // Inicializar Flatpickr para el campo de fecha y hora de inicio
            let inicioFlatpickr = flatpickr("#FECHA_INICIO_EQUIPO", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altFormat: 'd-m-Y H:i',
                altInput: true,
                minDate: "today", // La fecha de inicio mínimo será hoy
                onChange: function(selectedDates, dateStr, instance) {
                    if (terminoFlatpickr.selectedDates[0] && selectedDates[0] > terminoFlatpickr.selectedDates[0]) {
                        terminoFlatpickr.setDate(selectedDates[0]);
                    }
                    terminoFlatpickr.set('minDate', dateStr);
                },
            });

            let terminoFlatpickr = flatpickr("#FECHA_FIN_EQUIPO", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });
            // $('#FECHA_SOL_EQUIPO').flatpickr({
            //     dateFormat: 'Y-m-d',
            //     locale: 'es',
            //     minDate: "today",
            //     altFormat: "d-m-Y",
            //     altInput: true,
            //     showClearButton: true,
            //     defaultHour: 8, // Agregamos una hora predeterminada
            //     mode: "range",
            // });
            $('#HORA_INICIO_SOL_EQUIPO').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                locale: 'es',
                time_24hr: true,
                defaultHour: 8 // Agregamos una hora predeterminadas
            });
            $('#HORA_TERM_SOL_EQUIPO').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                locale: 'es',
                time_24hr: true,
                defaultHour: 9 // Agregamos una hora predeterminadas
            });
        });
    </script>
@stop
