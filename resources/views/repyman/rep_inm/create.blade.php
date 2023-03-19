@extends('adminlte::page')

@section('title', 'Solicitudes Inmuebles')

@section('content_header')
    <h1>Solicitud de Reparacion (Inmuebles)</h1>
@stop

@section('content')
    <div class="container">
        <form action="/pruebasJorge" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{ old('NOMBRE_SOLICITANTE') }}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA">
                        @if ($errors->has('NOMBRE_SOLICITANTE'))
                        <div class="invalid-feedback">
                            {{ $errors->first('NOMBRE_SOLICITANTE') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                        <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ old('RUT') }}" placeholder="Sin puntos con guión (Ej: 16738235-5)">
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
                        <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ old('DEPTO') }}" placeholder="Ej: ADMINISTRACION">
                        @if ($errors->has('DEPTO'))
                        <div class="invalid-feedback">
                            {{ $errors->first('DEPTO') }}
                        </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                        <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ old('EMAIL') }}" placeholder="Ej: demo@demo.cl">
                        @if ($errors->has('EMAIL'))
                        <div class="invalid-feedback">
                            {{ $errors->first('EMAIL') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <label for="ESTADO_SOL" class="form-label"><i class="fa-sharp fa-solid fa-building-flag"></i> Area Solicitada:</label>
                <select id="ESTADO_SOL" name="ESTADO_SOL" class="form-control">
                    <option value="OFICINA" selected>Oficina</option>
                    <option value="MUEBLES">Muebles</option>
                    <option value="INFRAESTRUCTURA">Infraestructura</option>
                    <option value="VEHICULOS">Vehiculos</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="REP_SOL" class="form-label"><i class="fa-solid fa-comments"></i> Solicitud:</label>
                <textarea id="REP_SOL" name="REP_SOL" class="form-control" aria-label="With textarea" placeholder="Describa el problema con el inmueble (MÁX 1000 CARACTERES)"></textarea>
            </div>
            <div class="mb-6">
                <div class="mb-3">
                    <label for="OBSERVACIONES" class="form-label" hidden><i class="fa-solid fa-comments"></i> Observaciones:</label>
                    <textarea class="form-control" aria-label="With textarea" hidden></textarea>
                </div>
            </div>
            <div class="mb-3">
                <label for="ESTADO_SOL" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL" name="ESTADO_SOL" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
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
                $('#materiales').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>

@stop