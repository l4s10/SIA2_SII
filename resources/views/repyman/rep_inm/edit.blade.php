@extends('adminlte::page')

@section('title', 'Solicitudes Inmuebles')

@section('content_header')
    <h1>Revisar solicitud n° {{$reparacion->ID_REP_INM}}</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('reparaciones.update', $reparacion->ID_REP_INM)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ $reparacion->NOMBRE_SOLICITANTE }}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA">
                        @if ($errors->has('NOMBRE_SOLICITANTE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE_SOLICITANTE') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                        <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $reparacion->RUT }}" placeholder="Sin puntos con guión (Ej: 16738235-5)">
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
                        <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ $reparacion->DEPTO }}" placeholder="Ej: ADMINISTRACION">
                        @if ($errors->has('DEPTO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('DEPTO') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                        <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ $reparacion->EMAIL }}" placeholder="Ej: demo@demo.cl">
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
                <select id="ID_TIPO_REP_GENERAL" name="ID_TIPO_REP_GENERAL" class="form-control">
                    <option value="">--SELECCIONE UNA OPCION--</option>
                    @foreach ($tipos_rep as $tipo_rep)
                        @if ($reparacion->ID_TIPO_REP_GENERAL == $tipo_rep->ID_TIPO_REP_GENERAL)
                        <option value="{{$tipo_rep->ID_TIPO_REP_GENERAL}}" selected>{{$tipo_rep->TIPO_REP}}</option>
                        @endif
                        <option value="{{$tipo_rep->ID_TIPO_REP_GENERAL}}">{{$tipo_rep->TIPO_REP}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="REP_SOL" class="form-label"><i class="fa-solid fa-comments"></i> Solicitud:</label>
                <textarea id="REP_SOL" name="REP_SOL" class="form-control" aria-label="With textarea" placeholder="Describa el problema con el inmueble (MÁX 1000 CARACTERES)">{{ $reparacion->REP_SOL}}</textarea>
            </div>
            <div class="mb-6">
                <div class="mb-3">
                    <label for="OBSERV_REP_INM" class="form-label"><i class="fa-solid fa-comments"></i> Observaciones:</label>
                    <textarea id="OBSERV_REP_INM" name="OBSERV_REP_INM" class="form-control" aria-label="With textarea" placeholder="Escriba aquí sus observaciones">{{$reparacion->OBSERV_REP_INM}}</textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="ESTADO_REP_INM" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_REP_INM" name="ESTADO_REP_INM" class="form-control">
                    <option value="INGRESADO" >Ingresado</option>
                    <option value="EN REVISION" selected>En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            {{-- *MODIFICADO POR* --}}
            <div class="mb-3" hidden>
                <label for="MODIFICADO_POR_REP_GEN" class="form-label"><i class="fa-solid fa-user"></i> Modificado por:</label>
                <input type="text" id="MODIFICADO_POR_REP_GEN" name="MODIFICADO_POR_REP_GEN" class="form-control{{ $errors->has('MODIFICADO_POR_REP_GEN') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                @if ($errors->has('MODIFICADO_POR_REP_GEN'))
                <div class="invalid-feedback">
                    {{ $errors->first('MODIFICADO_POR_REP_GEN') }}
                </div>
                @endif
            </div>
            <!-- Botones de envio -->
            <div class="mb-6"">
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
