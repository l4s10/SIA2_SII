@extends('adminlte::page')

@section('title', 'Reservar sala')

@section('content_header')
    <h1>Solicitar sala</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('solicitud.salas.store')}}" method="POST">
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
                        <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->ubicacion->UBICACION }}" placeholder="Ej: ADMINISTRACION" readonly>
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
            {{--**REFERENCIAS**--}}
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
                <input type="text" name="ID_TIPO_EQUIPOS" value="1">
            </div>
            {{-- *CARRITO DE COMPRAS* --}}
            <table id="equipos" class="table table-bordered">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Tipo equipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->TIPO_EQUIPO}}</td>
                            <td>
                                <button type="button" class="btn btn-info btn-agregar" data-nombre="{{ $tipo->TIPO_EQUIPO }}"><i class="fa-solid fa-cart-plus"></i></button>
                                <button type="button" class="btn btn-danger btn-eliminar" data-nombre="{{ $tipo->TIPO_EQUIPO }}"><i class="fa-solid fa-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="mb-3">
                <label for="EQUIPO_SALA" class="form-label"><i class="fa-solid fa-laptop"></i> Equipos solicitados:</label>
                <textarea class="form-control" id="EQUIPO_SALA" name="EQUIPO_SALA" placeholder="Si no necesita equipo ignore este campo" aria-label="With textarea" readonly></textarea>
            </div>
            {{--**LISTO**--}}
            <div class="mb-3">
                <label for="MOTIVO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de reserva:</label>
                <textarea class="form-control" id="MOTIVO_SOL_SALA" name="MOTIVO_SOL_SALA" placeholder="Escriba el motivo de solicitud de reserva" aria-label="With textarea" required></textarea>
            </div>
            {{--**LISTO**--}}
            <div class="mb-3">
                <label for="CANT_PERSONAS_SOL_SALAS" class="form-label"><i class="fa-solid fa-people-line"></i> Cantidad de personas:</label>
                <input type="number" class="form-control" id="CANT_PERSONAS_SOL_SALAS" name="CANT_PERSONAS_SOL_SALAS" placeholder="Escriba la cantidad de personas para el uso de la sala" min="1" max="100" value="1" required>
            </div>
            {{-- *FECHA SOLICITADA* --}}
            <div class="form-group">
                <label for="FECHA_SOL_SALA"><i class="fa-solid fa-calendar"></i> Fecha solicitada:</label>
                <div class="input-group">
                    <input type="text" id="FECHA_SOL_SALA" name="FECHA_SOL_SALA" class="form-control @if($errors->has('FECHA_SOL_SALA')) is-invalid @endif" placeholder="Ingrese la fecha" required value="{{ old('FECHA_SOL_SALA') }}">
                    {{-- *HORA INICIO SOLICITADA* --}}
                    <input type="text" id="HORA_SOL_SALA" name="HORA_SOL_SALA" class="form-control @if($errors->has('HORA_SOL_SALA')) is-invalid @endif" placeholder="Seleccione la hora de inicio" required value="{{ old('HORA_SOL_SALA') }}">
                    {{-- Hora termino solicitada --}}
                    <input type="text" id="HORA_TERM_SOL_SALA" name="HORA_TERM_SOL_SALA" class="form-control @if($errors->has('HORA_TERM_SOL_SALA')) is-invalid @endif" placeholder="Seleccione la hora de término" required value="{{ old('HORA_TERM_SOL_SALA') }}">
                    <button type="button" id="clearButton" class="btn btn-danger">Limpiar</button>
                </div>
                @if ($errors->has('FECHA_SOL_SALA'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_SALA') }}</div>
                @endif
            </div>

            {{-- **LISTO** --}}
            <div class="mb-3" hidden>
                <label for="ESTADO_SOL_SALA" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_SALA" name="ESTADO_SOL_SALA" class="form-control">
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
            {{-- *MODALES Y DEMAS* --}}
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
                            <label for="cantidad">Cantidad:</label>
                            <input type="number" id="cantidad" name="cantidad" min="1" value="1">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btn-cerrar-pie-modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="btn-agregar-carrito">Agregar al carrito</button>
                        </div>
                    </div>
                </div>
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
            $('#FECHA_SOL_SALA').flatpickr({
                dateFormat: 'Y-m-d',
                altFormat: 'd-m-Y',
                altInput: true,
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                mode: "range",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_SOL_SALA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_TERM_SOL_SALA').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('form').on('submit', function (e) {
                var fecha = $('#FECHA_SOL_SALA').val();
                var horaInicio = $('#HORA_SOL_SALA').val();
                var horaTermino = $('#HORA_TERM_SOL_SALA').val();

                if (!fecha || !horaInicio || !horaTermino) {
                    e.preventDefault(); // Cancela el envío del formulario
                    // Muestra un mensaje de error o realiza alguna acción adicional
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Por favor, complete todos los campos obligatorios.',
                        confirmButtonColor: '#3085d6',
                        confirmButtonText: 'Aceptar'
                    });
                }
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
    {{-- *CARRITO DE COMPRAS PARA EQUIPOS* --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btnAgregar = document.querySelectorAll('.btn-agregar');
            const btnEliminar = document.querySelectorAll('.btn-eliminar');
            const equipoSalaInput = document.getElementById('EQUIPO_SALA');

            // Manejar clic en el botón de agregar
            btnAgregar.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const nombreEquipo = this.getAttribute('data-nombre');
                    const equipoSala = equipoSalaInput.value;

                    // Verificar si el equipo ya está en el carrito
                    if (equipoSala.includes(nombreEquipo)) {
                        Swal.fire({
                            icon: 'warning',
                            text: 'El equipo ya está en el carrito',
                            showConfirmButton: false,
                            timer: 3000 // Cerrar automáticamente después de 3 segundos
                        });
                    } else {
                        // Agregar el equipo al carrito
                        const nuevoEquipoSala = equipoSala ? nombreEquipo + ', ' + equipoSala : nombreEquipo;
                        equipoSalaInput.value = nuevoEquipoSala;
                    }
                });
            });


            // Manejar clic en el botón de eliminar
            btnEliminar.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const nombreEquipo = this.getAttribute('data-nombre');
                    const equipoSala = equipoSalaInput.value;

                    // Separar los elementos del carrito de compras por coma
                    const elementos = equipoSala.split(', ');

                    // Remover el equipo del carrito
                    const nuevosElementos = elementos.filter(function (elemento) {
                        return elemento !== nombreEquipo;
                    });

                    equipoSalaInput.value = nuevosElementos.join(', ');
                });
            });
        });
    </script>


@stop
