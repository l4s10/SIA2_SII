@extends('adminlte::page')

@section('title', 'Solicitar reserva')

@section('content_header')
    <h1>Solicitud de reserva de sala</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('solicitud.salas.update',$solicitud->ID_SOL_SALA)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" >
                        <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{$solicitud->NOMBRE_SOLICITANTE }}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
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
            {{--**REFERENCIAS**--}}
            <div class="row" hidden>
                <div class="col-md-6 mb-3" >
                    <label for="ID_CATEGORIA_SALA" class="form-label"><i class="fa-solid fa-person-shelter"></i> Tipo de solicitud</label>
                    <select id="ID_CATEGORIA_SALA" name="ID_CATEGORIA_SALA" class="form-control">
                        <option value="">--Seleccione el tipo de solicitud--</option>
                        @foreach ($categorias as $categoria)
                            @if ($categoria->CATEGORIA_SALA == 'SALAS')
                                <option value="{{$categoria->ID_CATEGORIA_SALA}}" selected>{{$categoria->CATEGORIA_SALA}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="row" hidden>
                <div class="col-md-6 mb-3">
                    <label for="ID_TIPO_EQUIPOS">¿Necesita equipo?</label>
                    <select name="ID_TIPO_EQUIPOS" id="ID_TIPO_EQUIPOS" class="form-control" hidden>
                        <option value="">--No necesita equipo--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->ID_TIPO_EQUIPOS}}" @if ($tipo->ID_TIPO_EQUIPOS == $solicitud->ID_TIPO_EQUIPOS) selected @endif>{{$tipo->TIPO_EQUIPO}}</option>
                        @endforeach
                    </select>
                </div>
            </div> --}}
            {{-- *EQUIPOS SOLICITADOS* --}}
            <div class="form-group">
                <label for="EQUIPO_SALA">Equipos solicitados</label>
                <input type="text" class="form-control" name="EQUIPO_SALA" value="{{ empty($solicitud->EQUIPO_SALA) ? 'El solicitante no pidió equipos' : $solicitud->EQUIPO_SALA }}" readonly>
            </div>
            {{-- *CANTIDAD PERSONAS* --}}
            <div class="form-group">
                <label for="CANT_PERSONAS_SOL_SALAS" class="form-label"><i class="fa-solid fa-people-line"></i> Cantidad de personas:</label>
                <input type="number" class="form-control @error('CANT_PERSONAS_SOL_SALAS') is-invalid @enderror" id="CANT_PERSONAS_SOL_SALAS" name="CANT_PERSONAS_SOL_SALAS" placeholder="Escriba la cantidad de personas para el uso de la sala" min="1" max="100" value="{{$solicitud->CANT_PERSONAS_SOL_SALAS}}" readonly>
                @error('CANT_PERSONAS_SOL_SALAS')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{--**LISTO**--}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de reserva:</label>
                <textarea class="form-control @error('MOTIVO_SOL_SALA') is-invalid @enderror" id="MOTIVO_SOL_SALA" name="MOTIVO_SOL_SALA" placeholder="Escriba el motivo de solicitud de reserva (En caso de ser bodegas especificar cual)" aria-label="With textarea" readonly>{{$solicitud->MOTIVO_SOL_SALA}}</textarea>
                @error('MOTIVO_SOL_SALA')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- *FECHA SOLICITADA* --}}
            <div class="form-group">
                <label for="FECHA_SOL_SALA"><i class="fa-solid fa-calendar"></i> Fecha solicitada:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SOL_SALA" name="FECHA_SOL_SALA" class="form-control @error('FECHA_SOL_SALA') is-invalid @enderror" placeholder="Ingrese la fecha" data-input required value="{{ $solicitud->FECHA_SOL_SALA }}" disabled>
                    {{-- *HORA SOLICITADA* --}}
                    <input type="text" id="HORA_SOL_SALA" name="HORA_SOL_SALA" class="form-control flatpickr @error('HORA_SOL_SALA') is-invalid @enderror" placeholder="Seleccione la hora" data-input required value="{{ $solicitud->HORA_SOL_SALA }}" readonly>
                    {{-- Hora termino solicitada --}}
                    <input type="text" id="HORA_TERM_SOL_SALA" name="HORA_TERM_SOL_SALA" class="form-control flatpickr @if($errors->has('HORA_TERM_SOL_SALA')) is-invalid @endif" placeholder="Seleccione la hora de término" data-input required value="{{ $solicitud->HORA_TERM_SOL_SALA }}" readonly>
                </div>
                @error('FECHA_SOL_SALA')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @error('HORA_SOL_SALA')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row">
                <div class="col-md-6">
                    {{-- Fecha y hora de inicio asignadas --}}
                    <div class="form-group">
                        <label for="FECHA_INICIO_ASIG_SALA"><i class="fa-solid fa-calendar"></i> Fecha y hora de inicio asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_INICIO_ASIG_SALA" name="FECHA_INICIO_ASIG_SALA" class="form-control @error('FECHA_INICIO_ASIG_SALA') is-invalid @enderror" placeholder="Seleccione fecha y hora de inicio" required value="{{ old('FECHA_INICIO_ASIG_SALA', $solicitud->FECHA_INICIO_ASIG_SALA) }}">
                        </div>
                        @error('FECHA_INICIO_ASIG_SALA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- **Fecha y hora de término asignadas **--}}
                    <div class="form-group">
                        <label for="FECHA_TERM_ASIG_SALA"><i class="fa-solid fa-calendar"></i> Fecha y hora de término asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_TERM_ASIG_SALA" name="FECHA_TERM_ASIG_SALA" class="form-control @error('FECHA_TERM_ASIG_SALA') is-invalid @enderror" placeholder="Seleccione fecha y hora de término" required value="{{ old('FECHA_TERM_ASIG_SALA', $solicitud->FECHA_TERM_ASIG_SALA) }}">
                        </div>
                        @error('FECHA_TERM_ASIG_SALA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- **ESTADO SOLICITUD** --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_SALA" name="ESTADO_SOL_SALA" class="form-control">
                    <option value="INGRESADO" {{ $solicitud->ESTADO_SOL_SALA === 'INGRESADO' ? 'selected' : '' }}>🟠 Ingresado</option>
                    <option value="EN REVISION" {{ $solicitud->ESTADO_SOL_SALA === 'EN REVISION' ? 'selected' : '' }}>🟡 En revisión</option>
                    <option value="ACEPTADO" {{ $solicitud->ESTADO_SOL_SALA === 'ACEPTADO' ? 'selected' : '' }}>🟢 Aceptado</option>
                    <option value="RECHAZADO" {{ $solicitud->ESTADO_SOL_SALA === 'RECHAZADO' ? 'selected' : '' }}>🔴 Rechazado</option>
                </select>
            </div>
            {{-- !!CAMPOS NIVEL 2 --}}
            {{-- Sala a asignar (depende de ID_CATEGORIA_SALA) --}}
            <div class="mb-3">
                <label for="SALA_A_ASIGNAR" class="form-label"><i class="fa-solid fa-person-shelter"></i> Sala a asignar:</label>
                <select id="SALA_A_ASIGNAR" name="SALA_A_ASIGNAR" class="form-control @error('SALA_A_ASIGNAR') is-invalid @enderror">
                    <option value="" selected>--Seleccione una sala--</option>
                    @foreach ($salas as $sala)
                        @if ($sala->ESTADO_SALA == 'DISPONIBLE' && $sala->ID_CATEGORIA_SALA == $solicitud->ID_CATEGORIA_SALA)
                            <option value="{{ $sala->NOMBRE_SALA }}" @if (old('SALA_A_ASIGNAR', $solicitud->SALA_A_ASIGNAR) == $sala->NOMBRE_SALA) selected @endif>{{ $sala->NOMBRE_SALA }} ({{ $sala->CAPACIDAD_PERSONAS }} personas)</option>
                        @endif
                    @endforeach
                </select>
                @error('SALA_A_ASIGNAR')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Observaciones --}}
            <div class="mb-3">
                <label for="OBSERV_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Observaciones:</label>
                <textarea class="form-control @error('OBSERV_SOL_SALA') is-invalid @enderror" id="OBSERV_SOL_SALA" name="OBSERV_SOL_SALA" placeholder="Escriba sus observaciones" aria-label="With textarea">{{ old('OBSERV_SOL_SALA', $solicitud->OBSERV_SOL_SALA) }}</textarea>
                @error('OBSERV_SOL_SALA')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- Modificado por --}}
            <div class="mb-3" hidden>
                <label for="MODIFICADO_POR_SOL_SALA" class="form-label"><i class="fa-solid fa-user"></i> Modificado por:</label>
                <input type="text" id="MODIFICADO_POR_SOL_SALA" name="MODIFICADO_POR_SOL_SALA" class="form-control{{ $errors->has('MODIFICADO_POR_SOL_SALA') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES }} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA">
                @if ($errors->has('MODIFICADO_POR_SOL_SALA'))
                <div class="invalid-feedback">
                    {{ $errors->first('MODIFICADO_POR_SOL_SALA') }}
                </div>
                @endif
            </div>

            <div class="mb-3">
                <a href="{{route('reservas.dashboard')}}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar Cambios</button>
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
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script>
        $(function () {
            // Inicializar Flatpickr para el campo de fecha y hora de término
            $('#FECHA_SOL_SALA').flatpickr({
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
            let terminoFlatpickr;

            let inicioFlatpickr = flatpickr('#FECHA_INICIO_ASIG_SALA', {
                dateFormat: 'Y-m-d H:i',
                altFormat: 'd-m-Y H:i',
                altInput: true,
                locale: 'es',
                enableTime: true,
                minDate: "today",
                minTime: "08:00",
                maxTime: "18:00",
                onChange: function(selectedDates, dateStr, instance) {
                    if (selectedDates.length > 0) {
                        // Actualiza la fecha mínima de terminoFlatpickr para que sea igual a la fecha de inicio seleccionada
                        terminoFlatpickr.set('minDate', selectedDates[0]);

                        // Actualiza la hora mínima de terminoFlatpickr para que sea igual a la hora de inicio seleccionada
                        let selectedTime = instance.altInput.value.split(' ')[1];
                        terminoFlatpickr.set('minTime', selectedTime);
                    }
                },
            });

            terminoFlatpickr = flatpickr("#FECHA_TERM_ASIG_SALA", {
                dateFormat: "Y-m-d H:i",
                altFormat: 'd-m-Y H:i',
                altInput: true,
                locale: 'es',
                enableTime: true,
                minDate: "today",
                minTime: "08:00",
                maxTime: "18:00",
            });
        });
    </script>

@stop
