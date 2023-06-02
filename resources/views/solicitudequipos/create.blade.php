@extends('adminlte::page')

@section('title', 'Solicitar equipo')

@section('content_header')
    <h1>Solicitud de Reserva de Equipos</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('solequipos.store')}}" method="POST">
            @csrf
            <div class="row">
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
                        <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ auth()->user()->departamento->DEPARTAMENTO }}" placeholder="Ej: ADMINISTRACION" readonly>
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
            {{-- * PASA A SER CARRITO *--}}
            {{-- <div class="mb-3">
                <label for="ID_TIPO_EQUIPOS" class="form-label"><i class="fa-solid fa-desktop"></i> Tipo de equipo:</label>
                <select id="ID_TIPO_EQUIPOS" name="ID_TIPO_EQUIPOS" class="form-control @if($errors->has('ID_TIPO_EQUIPOS')) is-invalid @endif" required>
                    <option value="" selected>--Seleccione un tipo de equipo--</option>
                    @foreach($tipos as $tipo)
                        <option value="{{ $tipo->ID_TIPO_EQUIPOS }}">
                            {{ $tipo->TIPO_EQUIPO }}
                        </option>
                    @endforeach
                </select>
                @error('ID_TIPO_EQUIPOS')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div> --}}

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
                <label for="EQUIPO_SALA" class="form-label"><i class="fa-solid fa-file-pen"></i> Resumen:</label>
                <textarea id="EQUIPO_SALA" name="EQUIPO_SALA" class="form-control @error('EQUIPO_SALA') is-invalid @enderror" aria-label="With textarea" rows="1" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)" readonly>{{ old('EQUIPO_SALA') }}</textarea>
                @error('EQUIPO_SALA')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="MOTIVO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_EQUIPO" name="MOTIVO_SOL_EQUIPO" class="form-control @error('MOTIVO_SOL_EQUIPO') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)">{{ old('MOTIVO_SOL_EQUIPO') }}</textarea>
                @error('MOTIVO_SOL_EQUIPO')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="FECHA_SOL_EQUIPO"><i class="fa-solid fa-calendar"></i> Fecha de Inicio:</label>
                <input type="text" id="FECHA_SOL_EQUIPO" name="FECHA_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('FECHA_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese fecha de inicio" data-input required value="{{ old('FECHA_SOL_EQUIPO') }}">
                @if ($errors->has('FECHA_SOL_EQUIPO'))
                    <div class="invalid-feedback">{{ $errors->first('FECHA_SOL_EQUIPO') }}</div>
                @endif
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label for="HORA_INICIO_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Inicio:</label>
                    <input type="text" id="HORA_INICIO_SOL_EQUIPO" name="HORA_INICIO_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_INICIO_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de inicio" data-input required value="{{ old('HORA_INICIO_SOL_EQUIPO') }}">
                    @if ($errors->has('HORA_INICIO_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_INICIO_SOL_EQUIPO') }}</div>
                    @endif
                </div>

                <div class="form-group col-md-6">
                    <label for="HORA_TERM_SOL_EQUIPO"><i class="fa-solid fa-clock"></i> Hora de Término:</label>
                    <input type="text" id="HORA_TERM_SOL_EQUIPO" name="HORA_TERM_SOL_EQUIPO" class="form-control flatpickr @if($errors->has('HORA_TERM_SOL_EQUIPO')) is-invalid @endif" placeholder="Ingrese hora de término" data-input required value="{{ old('HORA_TERM_SOL_EQUIPO') }}">
                    @if ($errors->has('HORA_TERM_SOL_EQUIPO'))
                        <div class="invalid-feedback">{{ $errors->first('HORA_TERM_SOL_EQUIPO') }}</div>
                    @endif
                </div>
            </div>


            <div class="mb-3">
                <label for="ESTADO_SOL_EQUIPO" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL_EQUIPO" name="ESTADO_SOL_EQUIPO" class="form-control" disabled>
                    <option value="INGRESADO" selected>Ingresado</option>
                    <option value="EN REVISION">En revisión</option>
                    <option value="ACEPTADO">Aceptado</option>
                    <option value="RECHAZADO">Rechazado</option>
                </select>
            </div>
            <a href="{{route('solequipos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-primary">Enviar solicitud</button>
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
                        alert('El equipo ya está en el carrito');
                    } else {
                        // Agregar el equipo al carrito
                        equipoSalaInput.value = equipoSala ? equipoSala + ', ' + nombreEquipo : nombreEquipo;
                    }
                });
            });

            // Manejar clic en el botón de eliminar
            btnEliminar.forEach(function (btn) {
                btn.addEventListener('click', function () {
                    const nombreEquipo = this.getAttribute('data-nombre');
                    const equipoSala = equipoSalaInput.value;

                    // Remover el equipo del carrito
                    const nuevoEquipoSala = equipoSala.replace(nombreEquipo, '');
                    equipoSalaInput.value = nuevoEquipoSala.trim();
                });
            });
        });
    </script>
@stop
