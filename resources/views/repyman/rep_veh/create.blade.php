@extends('adminlte::page')

@section('title', 'Solicitar Reparación Vehicular')

@section('content_header')
    <h1>Solicitud Reparación/Mantención Vehicular</h1>
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

        <form action="{{route('repvehiculos.index')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <input type="text" id="ID_USUARIO" name="ID_USUARIO" value="{{auth()->user()->id}}" hidden>
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
                <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ auth()->user()->RUT }}" placeholder="Sin puntos con guión (Ej: 12345678-9)" readonly>
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
                    <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->ubicacion->UBICACION }}" placeholder="Ej: ADMINISTRACION" readonly>
                    @if ($errors->has('DEPTO'))
                    <div class="invalid-feedback">
                        {{ $errors->first('DEPTO') }}
                    </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                    <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ auth()->user()->email }}" placeholder="Ej: someone@example.com" readonly>
                    @if ($errors->has('EMAIL'))
                    <div class="invalid-feedback">
                        {{ $errors->first('EMAIL') }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
                <div class="col-12">
                    {{-- PARA PATENTE --}}
                    <div class="mb-3">
                        <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-car-on"></i> Información del vehiculo:</label>
                        <select id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" class="form-control @if($errors->has('PATENTE_VEHICULO')) is-invalid @endif">
                            <option value="">-- Seleccione el vehículo con problemas --</option>
                            @foreach ($vehiculos->groupBy('ubicacion.UBICACION') as $grupo => $autos)
                                <optgroup label="{{ $grupo }}">
                                    @foreach ($autos as $auto)
                                    <option value="{{ $auto->PATENTE_VEHICULO }}">{{ $auto->PATENTE_VEHICULO }} ({{ $auto->tipoVehiculo->TIPO_VEHICULO }})</option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @if($errors->has('PATENTE_VEHICULO'))
                            <div class="invalid-feedback">{{$errors->first('PATENTE_VEHICULO')}}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ID_TIPO_SERVICIO" class="form-label"><i class="fa-solid fa-shop-lock"></i> Tipo de reparacion:</label>
                        <select id="ID_TIPO_SERVICIO" name="ID_TIPO_SERVICIO" class="form-control @if($errors->has('ID_TIPO_SERVICIO')) is-invalid @endif">
                            <option value="">-- Seleccione --</option>
                            @foreach ($tipos_servicio as $tipo_servicio)
                                <option value="{{$tipo_servicio->ID_TIPO_SERVICIO}}">{{$tipo_servicio->TIPO_SERVICIO}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ID_TIPO_SERVICIO'))
                            <div class="invalid-feedback">{{$errors->first('ID_TIPO_SERVICIO')}}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="DETALLE_REPARACION_REP_VEH" class="form-label"><i class="fa-solid fa-location-pin-lock"></i> Motivo de reparación:</label>
                        <textarea id="DETALLE_REPARACION_REP_VEH" name="DETALLE_REPARACION_REP_VEH" class="form-control @if($errors->has('DETALLE_REPARACION_REP_VEH')) is-invalid @endif" aria-label="With textarea" placeholder="Indique aquí que problemas tiene el vehículo"></textarea>
                        @if($errors->has('DETALLE_REPARACION_REP_VEH'))
                            <div class="invalid-feedback">{{$errors->first('DETALLE_REPARACION_REP_VEH')}}</div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ESTADO_SOL_REP_VEH" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                        <select id="ESTADO_SOL_REP_VEH" name="ESTADO_SOL_REP_VEH" class="form-control" disabled>
                            <option value="INGRESADO" selected>Ingresado</option>
                            <option value="EN REVISION">En revisión</option>
                            <option value="ACEPTADO">Aceptado</option>
                            <option value="RECHAZADO">Rechazado</option>
                        </select>
                    </div>
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
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <!-- CONEXION CON BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@stop
