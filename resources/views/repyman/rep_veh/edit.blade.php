@extends('adminlte::page')

@section('title', 'Revisar Solicitud')

@section('content_header')
    <h1>Revisar Solicitud </h1>
@stop

@section('content')
    <div class="container">
        <!-- Contenedores para los mensajes -->
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Exito! </strong>{{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dissmissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif

        <form action="{{route('repvehiculos.update', $solicitud->ID_SOL_REP_VEH)}}" method="POST">
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
                        <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT }}" placeholder="Sin puntos con guión (Ej: 16738235-5)" readonly>
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
            <div class="col-12">
                {{-- PARA PATENTE --}}
                <div class="mb-3">
                    <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-car-on"></i> Información del vehiculo:</label>
                    <select id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" class="form-control{{ $errors->has('PATENTE_VEHICULO') ? ' is-invalid' : '' }}">
                        <option value="">-- Seleccione el vehículo con problemas --</option>
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
                    @if ($errors->has('PATENTE_VEHICULO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('PATENTE_VEHICULO') }}
                        </div>
                    @endif
                </div>


                {{-- TIPO SERVICIO --}}
                <div class="mb-3">
                    <label for="ID_TIPO_SERVICIO" class="form-label"><i class="fa-solid fa-shop-lock"></i> Tipo de reparación:</label>
                    <select id="ID_TIPO_SERVICIO" name="ID_TIPO_SERVICIO" class="form-control {{ $errors->has('ID_TIPO_SERVICIO') ? 'is-invalid' : '' }}">
                        <option value="">-- Seleccione un tipo --</option>
                        @foreach ($tipos_servicio as $tipo_servicio)
                            @if ($solicitud->ID_TIPO_SERVICIO == $tipo_servicio->ID_TIPO_SERVICIO)
                            <option value="{{$tipo_servicio->ID_TIPO_SERVICIO}}" selected>{{$tipo_servicio->TIPO_SERVICIO}}</option>
                            @else
                            <option value="{{$tipo_servicio->ID_TIPO_SERVICIO}}">{{$tipo_servicio->TIPO_SERVICIO}}</option>
                            @endif
                        @endforeach
                    </select>
                    @if ($errors->has('ID_TIPO_SERVICIO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ID_TIPO_SERVICIO') }}
                        </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <!-- Campos FECHA_INICIO_REP_VEH y FECHA_TERMINO_REP_VEH -->
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="FECHA_INICIO_REP_VEH"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                        <input type="text" id="FECHA_INICIO_REP_VEH" name="FECHA_INICIO_REP_VEH" class="form-control flatpickr @if($errors->has('FECHA_INICIO_REP_VEH')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input required value="{{$solicitud->FECHA_INICIO_REP_VEH}}">
                        @if ($errors->has('FECHA_INICIO_REP_VEH'))
                            <div class="invalid-feedback">{{ $errors->first('FECHA_INICIO_REP_VEH') }}</div>
                        @endif
                    </div>

                    <div class="form-group col-md-6">
                        <label for="FECHA_TERMINO_REP_VEH"><i class="fa-solid fa-calendar"></i> Fecha de Término:</label>
                        <input type="text" id="FECHA_TERMINO_REP_VEH" name="FECHA_TERMINO_REP_VEH" class="form-control flatpickr @if($errors->has('FECHA_TERMINO_REP_VEH')) is-invalid @endif" placeholder="Ingrese fecha de término" data-input required value="{{$solicitud->FECHA_TERMINO_REP_VEH}}">
                        @if ($errors->has('FECHA_TERMINO_REP_VEH'))
                            <div class="invalid-feedback">{{ $errors->first('FECHA_TERMINO_REP_VEH') }}</div>
                        @endif
                    </div>
                </div>


                <div class="mb-3">
                    <label for="DETALLE_REPARACION_REP_VEH" class="form-label"><i class="fa-solid fa-location-pin-lock"></i> Motivo de reparación:</label>
                    <textarea id="DETALLE_REPARACION_REP_VEH" name="DETALLE_REPARACION_REP_VEH" class="form-control" aria-label="With textarea" placeholder="Indique aquí que problemas tiene el vehículo">{{$solicitud->DETALLE_REPARACION_REP_VEH}}</textarea>
                <div>
                    <div class="mb-3">
                        <label for="OBSERV_REP_VEH" class="form-label"><i class="fa-solid fa-comments"></i> Observaciones:</label>
                        <textarea id="OBSERV_REP_VEH" name="OBSERV_REP_VEH" class="form-control" aria-label="With textarea" placeholder="Indique aquí sus observaciones">{{$solicitud->OBSERV_REP_VEH}}</textarea>
                    <div>
                <div class="mb-3">
                    <label for="ESTADO_SOL_REP_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                    <select id="ESTADO_SOL_REP_VEH" name="ESTADO_SOL_REP_VEH" class="form-control">
                        <option value="INGRESADO">Ingresado</option>
                        <option value="EN REVISION"selected>En revisión</option>
                        <option value="ACEPTADO">Aceptado</option>
                        <option value="RECHAZADO">Rechazado</option>
                    </select>
                </div>
                {{-- *MODIFICADO POR* --}}
                <div class="mb-3" hidden>
                    <label for="MODIFICADO_POR_REP_VEH" class="form-label"><i class="fa-solid fa-user"></i> Modificado por:</label>
                    <input type="text" id="MODIFICADO_POR_REP_VEH" name="MODIFICADO_POR_REP_VEH" class="form-control{{ $errors->has('MODIFICADO_POR_REP_VEH') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                    @if ($errors->has('MODIFICADO_POR_REP_VEH'))
                    <div class="invalid-feedback">
                        {{ $errors->first('MODIFICADO_POR_REP_VEH') }}
                    </div>
                    @endif
                </div>
            </div>
            <!-- Botones de envio -->
            <div class="mb-6">
                <a href="{{route('repvehiculos.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-sharp fa-solid fa-paper-plane"></i> Enviar Solicitud</button>
            </div>
        </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Incluir archivos CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <!-- CONEXION CON BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Incluir archivos JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script>
        $(function () {
            $('#FECHA_INICIO_REP_VEH').flatpickr({
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
                locale: 'es',
                minDate: 'today',
                showClearButton: true,
                defaultHour: 8 // Agregamos una hora predeterminada
            });

            $('#FECHA_TERMINO_REP_VEH').flatpickr({
                enableTime: true,
                dateFormat: 'Y-m-d H:i',
                locale: 'es',
                minDate: 'today',
                showClearButton: true,
                defaultHour: 8 // Agregamos una hora predeterminada
            });

             // Agregamos la siguiente línea para cambiar el fondo del campo
            $('#FECHA_INICIO_REP_VEH, #FECHA_TERMINO_REP_VEH').css('background-color', 'white');
        });
    </script>
@stop
