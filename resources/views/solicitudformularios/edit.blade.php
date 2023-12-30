@extends('adminlte::page')

@section('title', 'Solicitar Formulario')

@section('content_header')
    <h1>Revisar solicitud N° {{$solicitud->ID_SOL_FORM}}</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('formulariosSol.update',$solicitud->ID_SOL_FORM)}}" method="POST">
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
                            <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT }}" placeholder="Sin puntos con guion (Ej: 16738235-5)" readonly>
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
            <div class="form-group">
                <label for="ESTADO_SOL_FORM" class="form-label">Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_FORM" name="ESTADO_SOL_FORM" class="form-control" required>
                    <option value="INGRESADO">🟠 Ingresado</option>
                    <option value="EN REVISION" selected>🟡 En revisión</option>
                    <option value="ACEPTADO">🟢 Aceptado</option>
                    <option value="RECHAZADO">🔴 Rechazado</option>
                </select>
            </div>

            <div class="table-responsive">
                <table id="formularios" class="table table-bordered mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Nombre Formulario</th>
                            <th scope="col">Tipo Formulario</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formularios as $formulario)
                            <tr>
                                <td>{{$formulario->NOMBRE_FORMULARIO}}</td>
                                <td>{{$formulario->TIPO_FORMULARIO}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="FORM_SOL">Resumen:</label>
                <textarea class="form-control" id="FORM_SOL" name="FORM_SOL" rows="3" readonly>{{$solicitud->FORM_SOL}}</textarea>
            </div>
            <div class="form-group">
                <label class="form-label" for="OBSERV_SOL_FORM">Observaciones:</label>
                <textarea class="form-control {{ $errors->has('OBSERV_SOL_FORM') ? 'is-invalid' : '' }}" name="OBSERV_SOL_FORM" id="OBSERV_SOL_FORM" placeholder="Escriba sus observaciones"> {{$solicitud->OBSERV_SOL_FORM}} </textarea>
                @if ($errors->has('OBSERV_SOL_FORM'))
                    <div class="invalid-feedback">
                        {{ $errors->first('OBSERV_SOL_FORM') }}
                    </div>
                @endif
            </div>
            <!-- Botones de envio -->
            <div class="mb-6">
                <a href="{{route('formulariosSol.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
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
    <!-- DATATABLES (NO TOCAR) -->
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#formularios').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
            },
            });
        });
    </script>
@stop
