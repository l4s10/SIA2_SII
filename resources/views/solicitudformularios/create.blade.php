@extends('adminlte::page')

@section('title', 'Solicitar Formulario')

@section('content_header')
    <h1>Solicitud de Formulario</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('formulariosSol.store')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                    <input type="text" id="ID_USUARIO" name="ID_USUARIO" value="{{auth()->user()->id}}" hidden>
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
            <div class="form-group">
                <label for="ESTADO_SOL_FORM" class="form-label"><i class="fa-solid fa-file-circle-question"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_FORM" name="ESTADO_SOL_FORM" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>

            <div class="table-responsive">
                <table id="formularios" class="table table-bordered mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Nombre Formulario</th>
                            <th scope="col">Tipo Formulario</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($formularios as $formulario)
                            <tr>
                                <td>{{$formulario->NOMBRE_FORMULARIO}}</td>
                                <td>{{$formulario->TIPO_FORMULARIO}}</td>
                                <td>
                                    <button type="button" class="btn btn-info btn-agregar" data-nombre="{{ $formulario->NOMBRE_FORMULARIO }}" data-tipo="{{ $formulario->TIPO_FORMULARIO }}"><i class="fa-solid fa-cart-plus"></i></button>
                                    <button type="button" class="btn btn-danger btn-eliminar" data-nombre="{{ $formulario->NOMBRE_FORMULARIO }}"><i class="fa-solid fa-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="form-group">
                <label for="FORM_SOL"><i class="fa-solid fa-cart-shopping"></i> Carrito:</label>
                <textarea class="form-control @if($errors->has('FORM_SOL')) is-invalid @endif" id="FORM_SOL" name="FORM_SOL" rows="3" placeholder="Artículos en el carrito (Máx 1000 caracteres)" readonly required></textarea>
                @if($errors->has('FORM_SOL'))
                    <div class="invalid-feedback">{{$errors->first('FORM_SOL')}}</div>
                @endif
            </div>
            <div class="form-group" hidden>
                <label class="form-label" for="OBSERV_SOL_FORM">Observaciones:</label>
                <textarea class="form-control" name="OBSERV_SOL_FORM" id="OBSERV_SOL_FORM" placeholder="Escriba sus observaciones" readonly></textarea>
            </div>
            <!-- Botones de envio -->
            <div class="mb-6">
                <a href="{{route('formulariosSol.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button type="submit" class="btn btn-primary" tabindex="4"><i class="fa-sharp fa-solid fa-paper-plane"></i> Enviar Solicitud</button>
            </div>
        </form>
        {{-- MODAL CARRITO --}}
        <div class="modal fade" id="modal-carrito" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar al carrito</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="btn-cerrar-modal">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p id="nombre-material"></p>
                        <p id="tipo-material"></p>
                        <label class="form-label" for="cantidad">Cantidad:</label>
                        <input class="form-control" type="number" id="cantidad" name="cantidad" min="1" value="1">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cerrar-pie-modal">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="btn-agregar-carrito">Agregar al carrito</button>
                    </div>
                </div>
            </div>
        </div>

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
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>

    <!-- CARRITO DE COMPRAS -->
    <script>
        $(document).ready(function() {
        // Capturar clic en botón "Agregar al carrito"
        $(document).on('click', '.btn-agregar', function() {
            // Obtener valores de los atributos "data" del botón
            var nombreMaterial = $(this).data('nombre');
            var tipoMaterial = $(this).data('tipo');
            // Mostrar valores en el modal
            $('#nombre-material').text('Nombre material: ' + nombreMaterial);
            $('#tipo-material').text('Tipo material: ' + tipoMaterial);
            // Mostrar modal
            $('#modal-carrito').modal('show');
            // Deshabilitar botón "Agregar al carrito"
            $(this).prop('disabled', true);
        });


        // Capturar clic en botón "Eliminar"
            $(document).on('click', '.btn-eliminar', function() {
            var nombreMaterial = $(this).data('nombre');
            // Eliminar el artículo del carrito
            var carritoTextarea = $('#FORM_SOL');
            var carritoActual = carritoTextarea.val();
            var regex = new RegExp('- \\d+ unidad\\(es\\) de "' + nombreMaterial + '".*\n?', 'gm');
            var nuevoCarrito = carritoActual.replace(regex, '');
            carritoTextarea.val(nuevoCarrito);

            // Habilitar el botón "Agregar al carrito" correspondiente
            $('.btn-agregar[data-nombre="' + nombreMaterial + '"]').prop('disabled', false);
        });

        $('#btn-cerrar-modal').on('click', function() {
            $('#modal-carrito').modal('hide');
            var nombreMaterial = $('#nombre-material').text().split(': ')[1];
            var tipoMaterial = $('#tipo-material').text().split(': ')[1];
            // Volver a habilitar botón "Agregar al carrito"
            $('.btn-agregar[data-nombre="' + nombreMaterial + '"][data-tipo="' + tipoMaterial + '"]').prop('disabled', false);
        });

        $('#btn-cerrar-pie-modal').on('click', function() {
            $('#modal-carrito').modal('hide');
            var nombreMaterial = $('#nombre-material').text().split(': ')[1];
            var tipoMaterial = $('#tipo-material').text().split(': ')[1];
            // Volver a habilitar botón "Agregar al carrito"
            $('.btn-agregar[data-nombre="' + nombreMaterial + '"][data-tipo="' + tipoMaterial + '"]').prop('disabled', false);
        });

            // Capturar clic en botón "Agregar al carrito" del modal
            $('#btn-agregar-carrito').click(function() {
                // Obtener valores del modal
                var nombreMaterial = $('#nombre-material').text().split(': ')[1];
                var tipoMaterial = $('#tipo-material').text().split(': ')[1];
                var cantidad = $('#cantidad').val();
                // Enviar información al carrito (aquí puedes hacer una petición AJAX)
                alert('Se agregó ' + cantidad + ' unidades de "' + nombreMaterial + '" de tipo "' + tipoMaterial + '" al carrito.');
                // Cerrar modal
                $('#modal-carrito').modal('hide');
                // Obtener valores del modal
                var nombreMaterial = $('#nombre-material').text().split(': ')[1];
                var tipoMaterial = $('#tipo-material').text().split(': ')[1];
                var cantidad = $('#cantidad').val();

                // Actualizar textarea con los artículos en el carrito
                var carritoTextarea = $('#FORM_SOL');
                var carritoActual = carritoTextarea.val();
                var nuevoArticulo = cantidad + ' unidad(es) de "' + nombreMaterial + '" de tipo "' + tipoMaterial + '\n';
                var nuevoCarrito = carritoActual + '- ' + nuevoArticulo;
                carritoTextarea.val(nuevoCarrito);
                //Reseteamos el valor
                $('#cantidad').val(1);
            });
        });
    </script>
@stop
