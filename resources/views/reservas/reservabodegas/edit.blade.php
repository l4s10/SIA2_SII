@extends('adminlte::page')

@section('title', 'Revisar solicitud')

@section('content_header')
    <h1>Revisar solicitud bodega</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('solicitud.bodegas.update',$solicitud->ID_SOL_BODEGA)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" hidden>
                        <label for="ID_USUARIO" class="form-label"><i class="fa-solid fa-user"></i> ID PERSONA:</label>
                        <input type="number" id="ID_USUARIO" name="ID_USUARIO" class="form-control{{ $errors->has('ID_USUARIO') ? ' is-invalid' : '' }}" value="{{ $solicitud->ID_USUARIO }}">
                        @if ($errors->has('ID_USUARIO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ID_USUARIO') }}
                        </div>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{$solicitud->NOMBRE_SOLICITANTE}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                        @if ($errors->has('NOMBRE_SOLICITANTE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE_SOLICITANTE') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                        <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT}}" placeholder="Sin puntos con guion (Ej: 12345678-9)" readonly>
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
                        <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ $solicitud->EMAIL}}" placeholder="Ej: demo@demo.cl" readonly>
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
                            @if ($categoria->CATEGORIA_SALA == 'BODEGAS')
                                <option value="{{$categoria->ID_CATEGORIA_SALA}}" selected>{{$categoria->CATEGORIA_SALA}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            {{-- *SELECCIONAR BODEGA* --}}
            <div class="form-group">
                <label for="BODEGA_PEDIDA" class="form-label"><i class="fa-solid fa-person-shelter"></i> Bodega solicitada:</label>
                <select id="BODEGA_PEDIDA" name="BODEGA_PEDIDA" class="form-control">
                    <option value="" selected>--Seleccione una bodega--</option>
                    @foreach ($salas as $sala)
                        @if ($sala->categoriaSala->CATEGORIA_SALA == 'BODEGAS')
                            <option value="{{ $sala->NOMBRE_SALA }}" {{ $solicitud->BODEGA_PEDIDA == $sala->NOMBRE_SALA ? 'selected' : '' }}>{{ $sala->NOMBRE_SALA }} ({{ $sala->CAPACIDAD_PERSONAS }} personas)</option>
                        @endif
                    @endforeach
                </select>
            </div>

            {{--**MOTIVO SOLICITUD**--}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_BODEGA" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de reserva:</label>
                <textarea class="form-control" id="MOTIVO_SOL_BODEGA" name="MOTIVO_SOL_BODEGA" placeholder="Escriba el motivo de solicitud de reserva" aria-label="With textarea" readonly>{{$solicitud->MOTIVO_SOL_BODEGA}}</textarea>
            </div>
            {{-- *FECHA SOLICITADA* --}}
            <div class="form-group">
                <label for="FECHA_SOL_BODEGA"><i class="fa-solid fa-calendar"></i> Fecha solicitada:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SOL_BODEGA" name="FECHA_SOL_BODEGA" class="form-control @if($errors->has('FECHA_SOL_BODEGA')) is-invalid @endif" placeholder="Ingrese la fecha" data-input required value="{{ $solicitud->FECHA_SOL_BODEGA }}">
                    {{-- *HORA SOLICITADA* --}}
                    <input type="text" id="HORA_INICIO_SOL_BODEGA" name="HORA_INICIO_SOL_BODEGA" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_BODEGA')) is-invalid @endif" placeholder="Seleccione la hora" data-input required value="{{$solicitud->HORA_INICIO_SOL_BODEGA }}">
                </div>
                @if ($errors->has('FECHA_SOL_BODEGA'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_BODEGA') }}</div>
                @endif
            </div>
            {{-- *FECHA ASIGNADA* --}}
            <div class="row">
                <div class="col-md-6">
                    {{-- Fecha y hora de inicio asignadas --}}
                    <div class="form-group">
                        <label for="FECHA_INICIO_ASIG_BODEGA"><i class="fa-solid fa-calendar"></i> Fecha y hora de inicio asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_INICIO_ASIG_BODEGA" name="FECHA_INICIO_ASIG_BODEGA" class="form-control @error('FECHA_INICIO_ASIG_BODEGA') is-invalid @enderror" placeholder="Seleccione fecha y hora de inicio" required value="{{$solicitud->FECHA_INICIO_ASIG_BODEGA}}">
                        </div>
                        @error('FECHA_INICIO_ASIG_BODEGA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- **Fecha y hora de término asignadas **--}}
                    <div class="form-group">
                        <label for="FECHA_TERM_ASIG_BODEGA"><i class="fa-solid fa-calendar"></i> Fecha y hora de término asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_TERM_ASIG_BODEGA" name="FECHA_TERM_ASIG_BODEGA" class="form-control @error('FECHA_TERM_ASIG_BODEGA') is-invalid @enderror" placeholder="Seleccione fecha y hora de término" required value="{{$solicitud->FECHA_TERM_ASIG_BODEGA }}">
                        </div>
                        @error('FECHA_TERM_ASIG_BODEGA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            {{-- **ESTADO SOL BODEGA** --}}
            <div class="mb-3">
                <label for="ESTADO_SOL_BODEGA" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_BODEGA" name="ESTADO_SOL_BODEGA" class="form-control">
                    <option value="INGRESADO" {{ $solicitud->ESTADO_SOL_BODEGA == 'INGRESADO' ? 'selected' : '' }}>Ingresado</option>
                    <option value="EN REVISION" {{ $solicitud->ESTADO_SOL_BODEGA == 'EN REVISION' ? 'selected' : '' }}>En revisión</option>
                    <option value="ACEPTADO" {{ $solicitud->ESTADO_SOL_BODEGA == 'ACEPTADO' ? 'selected' : '' }}>Aceptado</option>
                    <option value="RECHAZADO" {{ $solicitud->ESTADO_SOL_BODEGA == 'RECHAZADO' ? 'selected' : '' }}>Rechazado</option>
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
    <!-- CONEXION CON BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>


    <script>
        $(function () {
             // Inicializar Flatpickr para el campo de fecha y hora de inicio
             flatpickr("#FECHA_INICIO_ASIG_BODEGA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });

            // Inicializar Flatpickr para el campo de fecha y hora de término
            flatpickr("#FECHA_TERM_ASIG_BODEGA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });
            $('#FECHA_SOL_BODEGA').flatpickr({
                dateFormat: 'Y-m-d',
                altFormat: 'd-m-Y',
                altInput: true,
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                mode: "range",
            });
            $('#HORA_INICIO_SOL_BODEGA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
            });

        });
    </script>
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#equipos').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "columnDefs": [
                    { "orderable": false, "targets": 1 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@stop
