@extends('adminlte::page')

@section('title', 'Solicitar reserva')

@section('content_header')
    <h1>Solicitud de salas y bodegas</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('reservas.update',$solicitud->ID_SOL_SALA)}}" method="POST">
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
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="ID_CATEGORIA_SALA" class="form-label"><i class="fa-solid fa-person-shelter"></i> Tipo de solicitud</label>
                <select id="ID_CATEGORIA_SALA" name="ID_CATEGORIA_SALA" class="form-control" disabled>
                    <option value="" selected>--Seleccione el tipo de solicitud--</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->ID_CATEGORIA_SALA}}" @if ($categoria->ID_CATEGORIA_SALA == $solicitud->ID_CATEGORIA_SALA) selected @endif>{{$categoria->CATEGORIA_SALA}}</option>
                    @endforeach
                </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="ID_TIPO_EQUIPOS">¿Necesita equipo?</label>
                    <select name="ID_TIPO_EQUIPOS" id="ID_TIPO_EQUIPOS" class="form-control" disabled>
                        <option value="">--No necesita equipo--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->ID_TIPO_EQUIPOS}}" @if ($tipo->ID_TIPO_EQUIPOS == $solicitud->ID_TIPO_EQUIPOS) selected @endif>{{$tipo->TIPO_EQUIPO}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="CANT_PERSONAS_SOL_SALAS" class="form-label"><i class="fa-solid fa-people-line"></i> Cantidad de personas:</label>
                <input type="number" class="form-control" id="CANT_PERSONAS_SOL_SALAS" name="CANT_PERSONAS_SOL_SALAS" placeholder="Escriba la cantidad de personas para el uso de la sala" min="1" max="100" value="{{$solicitud->CANT_PERSONAS_SOL_SALAS}}">
            </div>
            {{--**LISTO**--}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de reserva:</label>
                <textarea class="form-control" id="MOTIVO_SOL_SALA" name="MOTIVO_SOL_SALA" placeholder="Escriba el motivo de solicitud de reserva (En caso de ser bodegas especificar cual)" aria-label="With textarea">{{$solicitud->MOTIVO_SOL_SALA}}</textarea>
            </div>
            {{-- FALTA SCRIPT --}}
            <div class="form-group">
                <label for="FECHA_SOL_SALA"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                <input type="text" id="FECHA_SOL_SALA" name="FECHA_SOL_SALA" class="form-control flatpickr @if($errors->has('FECHA_SOL_SALA')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input required value="{{ \Carbon\Carbon::parse($solicitud->FECHA_SOL_SALA)->format('d/m/Y') }}">
                @if ($errors->has('FECHA_SOL_SALA'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_SALA') }}</div>
                @endif
            </div>
            {{-- hora de inicio y termino --}}
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="HORA_INICIO_SOL_SALA"><i class="fa-solid fa-clock"></i> Hora de Inicio:</label>
                    <input type="text" id="HORA_INICIO_SOL_SALA" name="HORA_INICIO_SOL_SALA" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_SALA')) is-invalid @endif" placeholder="Ingrese hora de inicio" data-input required value="{{ $solicitud->HORA_INICIO_SOL_SALA }}">
                    @if ($errors->has('HORA_INICIO_SOL_SALA'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_INICIO_SOL_SALA') }}</div>
                    @endif
                </div>
                <div class="form-group col-md-6">
                    <label for="HORA_TERM_SOL_SALA"><i class="fa-solid fa-clock"></i> Hora de Término:</label>
                    <input type="text" id="HORA_TERM_SOL_SALA" name="HORA_TERM_SOL_SALA" class="form-control flatpickr @if($errors->has('HORA_TERM_SOL_SALA')) is-invalid @endif" placeholder="Ingrese hora de término" data-input required value="{{ $solicitud->HORA_TERM_SOL_SALA }}">
                        @if ($errors->has('HORA_TERM_SOL_SALA'))
                            <div class="invalid-feedback">{{ $errors->first('HORA_TERM_SOL_SALA') }}</div>
                        @endif
                </div>
            </div>
            {{-- **LISTO** --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_SALA" name="ESTADO_SOL_SALA" class="form-control">
                    <option value="INGRESADO">Ingresado</option>
                    <option value="EN REVISION" selected>En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            {{-- CAMPOS NIVEL 2 --}}
            {{-- Sala a asignar (depende de ID_CATEGORIA_SALA) --}}
            <div class="mb-3">
                <label for="SALA_A_ASIGNAR" class="form-label"><i class="fa-solid fa-person-shelter"></i> Sala/Bodega a asignar:</label>
                <select id="SALA_A_ASIGNAR" name="SALA_A_ASIGNAR" class="form-control">
                    <option value="" selected>--Seleccione una sala--</option>
                    @foreach ($salas as $sala)
                        @if ($sala->ESTADO_SALA == 'DISPONIBLE' && $sala->ID_CATEGORIA_SALA == $solicitud->ID_CATEGORIA_SALA)
                            <option value="{{ $sala->NOMBRE_SALA }}" @if ($solicitud->SALA_A_ASIGNAR == $sala->NOMBRE_SALA) selected @endif>{{ $sala->NOMBRE_SALA }} ({{ $sala->CAPACIDAD_PERSONAS }} personas)</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- Equipo a asignar (si se necesita) --}}
            <div class="mb-3">
                <label for="EQUIPO_SALA" class="form-label"><i class="fa-solid fa-person-shelter"></i> Data/Equipo a asignar:</label>
                <select id="EQUIPO_SALA" name="EQUIPO_SALA" class="form-control">
                    <option value="" selected>--N/A--</option>
                    @foreach ($equipos as $equipo)
                        @if ($equipo->ESTADO_EQUIPO == 'DISPONIBLE' && $equipo->ID_TIPO_EQUIPOS == $solicitud->ID_TIPO_EQUIPOS)
                            <option value="{{ $equipo->MODELO_EQUIPO }}" @if ($solicitud->EQUIPO_SALA == $equipo->MODELO_EQUIPO) selected @endif>{{ $equipo->MODELO_EQUIPO }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            {{-- Observaciones --}}
            <div class="mb-3">
                <label for="OBSERV_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Observaciones:</label>
                <textarea class="form-control" id="OBSERV_SOL_SALA" name="OBSERV_SOL_SALA" placeholder="Escriba sus observaciones" aria-label="With textarea">{{$solicitud->OBSERV_SOL_SALA}}</textarea>
            </div>
            {{-- Modificado por --}}
            <div class="mb-3" hidden>
                <label for="MODIFICADO_POR_SOL_SALA" class="form-label"><i class="fa-solid fa-user"></i> Modificado por:</label>
                <input type="text" id="MODIFICADO_POR_SOL_SALA" name="MODIFICADO_POR_SOL_SALA" class="form-control{{ $errors->has('MODIFICADO_POR_SOL_SALA') ? ' is-invalid' : '' }}" value="{{ auth()->user()->name }}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA">
                @if ($errors->has('MODIFICADO_POR_SOL_SALA'))
                <div class="invalid-feedback">
                    {{ $errors->first('MODIFICADO_POR_SOL_SALA') }}
                </div>
                @endif
            </div>

            <div class="mb-3">
                <a href="{{route('reservas.index')}}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Enviar Solicitud</button>
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
            $('#FECHA_SOL_SALA').flatpickr({
                dateFormat: 'd-m-Y',
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                defaultHour: 8 // Agregamos una hora predeterminada
            });
            $('#HORA_INICIO_SOL_SALA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                locale: 'es',
                time_24hr: true,
                defaultHour: 8 // Agregamos una hora predeterminadas
            });
            $('#HORA_TERM_SOL_SALA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: 'H:i',
                locale: 'es',
                time_24hr: true,
                defaultHour: 9 // Agregamos una hora predeterminadas
            });
            $('#FECHA_SOL_SALA, #HORA_INICIO_SOL_SALA, #HORA_TERM_SOL_SALA').css('background-color', 'white');
        });
    </script>
@stop
