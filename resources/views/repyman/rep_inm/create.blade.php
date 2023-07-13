@extends('adminlte::page')

@section('title', 'Solicitudes Inmuebles')

@section('content_header')
    <h1>Solicitud de Reparación para Inmuebles</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('reparaciones.index')}}" method="POST">
            @csrf
            <div class="row">
                <input type="text" id="ID_USUARIO" name="ID_USUARIO" value="{{auth()->user()->id}}" hidden>
                <div class="col-md-6">
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
            <div class="mb-3">
                <label for="ID_TIPO_REP_GENERAL" class="form-label"><i class="fa-sharp fa-solid fa-building-flag"></i> Area Solicitada:</label>
                <select id="ID_TIPO_REP_GENERAL" name="ID_TIPO_REP_GENERAL" class="form-control @if($errors->has('ID_TIPO_REP_GENERAL')) is-invalid @endif">
                    <option value="" selected>--SELECCIONE UNA OPCION--</option>
                    @foreach ($tipos_rep as $tipo_rep)
                        <option value="{{$tipo_rep->ID_TIPO_REP_GENERAL}}">{{$tipo_rep->TIPO_REP}}</option>
                    @endforeach
                </select>
                @if($errors->has('ID_TIPO_REP_GENERAL'))
                    <div class="invalid-feedback">{{$errors->first('ID_TIPO_REP_GENERAL')}}</div>
                @endif
            </div>
            <div class="mb-3">
                <label for="REP_SOL" class="form-label"><i class="fa-solid fa-comments"></i> Solicitud:</label>
                <textarea id="REP_SOL" name="REP_SOL" class="form-control @if($errors->has('REP_SOL')) is-invalid @endif" aria-label="With textarea" placeholder="Describa el problema con el inmueble (MÁX 1000 CARACTERES)"></textarea>
                @if($errors->has('REP_SOL'))
                    <div class="invalid-feedback">{{$errors->first('REP_SOL')}}</div>
                @endif
            </div>
            <div class="mb-6">
                <div class="mb-3">
                    <label for="OBSERV_REP_INM" class="form-label" hidden><i class="fa-solid fa-comments"></i> Observaciones:</label>
                    <textarea id="OBSERV_REP_INM" name="OBSERV_REP_INM" class="form-control" aria-label="With textarea" hidden>No existen observaciones por ahora.</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="ESTADO_REP_INM" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_REP_INM" name="ESTADO_REP_INM" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            <!-- Botones de envio -->
            <div class="mb-6">
                <a href="{{route('repyman.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-sharp fa-solid fa-paper-plane"></i> Enviar Solicitud</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <!-- CONEXION CON BOOTSTRAP -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
@stop
