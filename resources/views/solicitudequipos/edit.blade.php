@extends('adminlte::page')

@section('title', 'Solicitar equipo')

@section('content_header')
    <h1>Revisar solicitud n°{{$solicitud->ID_SOL_EQUIPOS}}</h1>
@stop

@section('content')
    <div class="container">
        <form action="/solequipos/{{$solicitud->ID_SOL_EQUIPOS}}" method="POST">
            @csrf
            @method('PUT')
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
                            <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT }}" placeholder="Sin puntos con guion (Ej: 12345678-9)">
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
                            <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ $solicitud->DEPTO }}" placeholder="Ej: ADMINISTRACION">
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
            {{-- Obtenemos el tipo de equipo solicitado --}}
            <div class="mb-3">
                <label for="ID_TIPO_EQUIPOS" class="form-label"><i class="fa-solid fa-desktop"></i> Tipo de equipo:</label>
                <select id="ID_TIPO_EQUIPOS" name="ID_TIPO_EQUIPOS" class="form-control @if($errors->has('ID_TIPO_EQUIPOS')) is-invalid @endif" required>
                    <option value="" selected>--Seleccione un tipo de equipo--</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->ID_TIPO_EQUIPOS }}" @if($solicitud->ID_TIPO_EQUIPOS == $tipo->ID_TIPO_EQUIPOS) selected @endif>
                            {{ $tipo->TIPO_EQUIPO }}
                        </option>
                    @endforeach
                </select>
                @error('ID_TIPO_EQUIPOS')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="MOTIVO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_EQUIPO" name="MOTIVO_SOL_EQUIPO" class="form-control @error('MOTIVO_SOL_EQUIPO') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)">{{ $solicitud->MOTIVO_SOL_EQUIPO }}</textarea>
                @error('MOTIVO_SOL_EQUIPO')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="FECHA_SOL_EQUIPO"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                <input type="text" id="FECHA_SOL_EQUIPO" name="FECHA_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('FECHA_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input required value=" {{ \Carbon\Carbon::parse($solicitud->FECHA_SOL_EQUIPO)->format('d/m/Y') }}">
                @if ($errors->has('FECHA_SOL_EQUIPO'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_EQUIPO') }}</div>
                @endif
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="HORA_INICIO_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Inicio:</label>
                    <input type="text" id="HORA_INICIO_SOL_EQUIPO" name="HORA_INICIO_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de inicio" data-input required value="{{ $solicitud->HORA_INICIO_SOL_EQUIPO }}">
                    @if ($errors->has('HORA_INICIO_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_INICIO_SOL_EQUIPO') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="HORA_TERM_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Término:</label>
                    <input type="text" id="HORA_TERM_SOL_EQUIPO" name="HORA_TERM_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_TERM_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de término" data-input required value="{{ $solicitud->HORA_TERM_SOL_EQUIPO }}">
                    @if ($errors->has('HORA_TERM_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_TERM_SOL_EQUIPO') }}</div>
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="ESTADO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_EQUIPO" name="ESTADO_SOL_EQUIPO" class="form-control">
                    <option value="INGRESADO">Ingresado</option>
                    <option value="EN REVISION" selected>En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            {{-- CAMPOS PARA NIVEL 2 --}}
            {{-- EQUIPO A ASIGNAR --}}
            <div class="mb-3">
                <label for="EQUIPO_A_ASIGNAR" class="form-label"><i class="fa-solid fa-desktop"></i> Equipo a asignar:</label>
                <select id="EQUIPO_A_ASIGNAR" name="EQUIPO_A_ASIGNAR" class="form-control @if($errors->has('EQUIPO_A_ASIGNAR')) is-invalid @endif" required>
                    <option value="" selected>--Seleccione el equipo a asignar--</option>
                    @foreach($equipos as $equipo)
                        @if($equipo->ID_TIPO_EQUIPOS == $solicitud->ID_TIPO_EQUIPOS)
                            <option value="{{ $equipo->ID_EQUIPO }}">{{ $equipo->MODELO_EQUIPO }} {{$equipo->MARCA_EQUIPO}}</option>
                        @endif
                    @endforeach
                </select>
                @error('EQUIPO_A_ASIGNAR')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
                <input type="text" id="MODIFICADO_POR_SOL_EQUIPO" name="MODIFICADO_POR_SOL_EQUIPO" class="form-control" value="{{ auth()->user()->name}}">
            </div>

            <!-- Botones de envio -->
            <div class="mb-6" style="padding: 1%;">
                <a href="/solequipos" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
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
            $('#FECHA_SOL_EQUIPO').flatpickr({
                dateFormat: 'd-m-Y',
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                defaultHour: 8 // Agregamos una hora predeterminada
            });
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
            $('#FECHA_SOL_EQUIPO, #HORA_INICIO_SOL_EQUIPO, #HORA_TERM_SOL_EQUIPO').css('background-color', 'white');
        });
    </script>
    {{-- Script para actualizar dinámicamente el campo EQUIPO_A_ASIGNAR --}}
    <script>
        $(document).ready(function() {
            $('#ID_TIPO_EQUIPOS').on('change', function() {
                var tipoEquipoId = $(this).val();
                $('#EQUIPO_A_ASIGNAR').empty();
                $('#EQUIPO_A_ASIGNAR').append('<option value="" selected>--Seleccione el equipo a asignar--</option>');
                @foreach($equipos as $equipo)
                    if({{$equipo->ID_TIPO_EQUIPOS}} == tipoEquipoId) {
                        $('#EQUIPO_A_ASIGNAR').append('<option value="{{$equipo->ID_EQUIPO}}">{{$equipo->MODELO_EQUIPO}} {{$equipo->MARCA_EQUIPO}}</option>');
                    }
                @endforeach
            });
        });
    </script>
@stop
