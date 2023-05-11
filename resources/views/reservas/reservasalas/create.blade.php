@extends('adminlte::page')

@section('title', 'Reservar sala')

@section('content_header')
    <h1>Solicitar sala</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('sala.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" hidden>
                        <label for="ID_USUARIO" class="form-label"><i class="fa-solid fa-user"></i> ID PERSONA:</label>
                        <input type="number" id="ID_USUARIO" name="ID_USUARIO" class="form-control{{ $errors->has('ID_USUARIO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->id }}">
                        @if ($errors->has('ID_USUARIO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ID_USUARIO') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES }} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                        @if ($errors->has('NOMBRE_SOLICITANTE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE_SOLICITANTE') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                        <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ auth()->user()->RUT }}" placeholder="Sin puntos con guion (Ej: 12345678-9)" readonly>
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
                        <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->departamento->DEPARTAMENTO }}" placeholder="Ej: ADMINISTRACION" readonly>
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
            {{--**LISTO**--}}
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
                <div class="col-md-6 mb-3">
                    <label for="ID_TIPO_EQUIPOS">¿Necesita equipo?</label>
                    <select name="ID_TIPO_EQUIPOS" id="ID_TIPO_EQUIPOS" class="form-control">
                        <option value="">--No necesita equipo--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->ID_TIPO_EQUIPOS}}">{{$tipo->TIPO_EQUIPO}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{--**LISTO**--}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de reserva:</label>
                <textarea class="form-control" id="MOTIVO_SOL_SALA" name="MOTIVO_SOL_SALA" placeholder="Escriba el motivo de solicitud de reserva (En caso de ser bodegas especificar cual)" aria-label="With textarea"></textarea>
            </div>
            {{--**listo**--}}
            <div class="mb-3">
                <label for="CANT_PERSONAS_SOL_SALAS" class="form-label"><i class="fa-solid fa-people-line"></i> Cantidad de personas:</label>
                <input type="number" class="form-control" id="CANT_PERSONAS_SOL_SALAS" name="CANT_PERSONAS_SOL_SALAS" placeholder="Escriba la cantidad de personas para el uso de la sala" min="1" max="100" value="1">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="FECHA_SOL_SALA"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                        <input type="text" id="FECHA_SOL_SALA" name="FECHA_SOL_SALA" class="form-control flatpickr @if($errors->has('FECHA_SOL_SALA')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input required value="{{ old('FECHA_SOL_SALA') }}">
                        @if ($errors->has('FECHA_SOL_SALA'))
                            <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_SALA') }}</div>
                        @endif
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="HORA_INICIO_SOL_SALA"><i class="fa-solid fa-clock"></i> Hora de Inicio:</label>
                        <input type="text" id="HORA_INICIO_SOL_SALA" name="HORA_INICIO_SOL_SALA" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_SALA')) is-invalid @endif" placeholder="Ingrese hora de inicio" data-input required value="{{ old('HORA_INICIO_SOL_SALA') }}">
                        @if ($errors->has('HORA_INICIO_SOL_SALA'))
                            <div class="invalid-feedback">{{ $errors->first('HORA_INICIO_SOL_SALA') }}</div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- **LISTO** --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_SALA" name="ESTADO_SOL_SALA" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            <div class="mb-3">
                <a href="{{route('reservas.dashboard')}}" class="btn btn-secondary">Cancelar</a>
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
                defaultHour: 8, // Agregamos una hora predeterminada
                mode: "multiple" // Permitimos la selección de múltiples fechas

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
