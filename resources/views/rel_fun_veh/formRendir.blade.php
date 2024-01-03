@extends('adminlte::page')

@section('title', 'Rendición chofer')

@section('content_header')
    <h1>Formulario rendición chofer</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('solicitud.vehiculos.update', $solicitud->ID_SOL_VEH) }}" method="POST" id="rendirForm">
            @csrf
            @method('PUT')
            {{-- *CAMPO CONDUCTOR* --}}
            <div class="mb-3">
                <label for="CONDUCTOR" class="form-label"><i class="fa-solid fa-user-plus"></i> Conductor:</label>
                <select id="CONDUCTOR" name="CONDUCTOR" class="form-control @if($errors->has('CONDUCTOR')) is-invalid @endif" disabled>
                    <option value="">--Seleccione un(a) conductor(a)--</option>
                    {{-- *CORRECCION DE FILTRO ARREGLADO, AHORA SOLO MUESTRA CONDUCTORES DEL MISMO DEPARTAMENTO* --}}
                    @foreach ($conductores as $conductor)
                    <option value="{{$conductor->id}}" class="" {{ $conductor->id == $solicitud->CONDUCTOR ? 'selected' : '' }}>
                        {{$conductor->NOMBRES}} {{$conductor->APELLIDOS}}
                    </option>
                @endforeach

                </select>
                @error('CONDUCTOR')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            {{-- *CAMPO MOTIVO SOLICITUD* --}}
            <div class="mb-3" disabled>
                <label for="MOTIVO_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Motivo de solicitud:</label>
                <textarea id="MOTIVO_SOL_VEH" name="MOTIVO_SOL_VEH" class="form-control @error('MOTIVO_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba el motivo de su solicitud (MÁX 1000 CARACTERES)" readonly autofocus>{{ $solicitud->MOTIVO_SOL_VEH }}</textarea>
                @error('MOTIVO_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="NOMBRE_OCUPANTES" class="form-label"><i class="fa-solid fa-users-line"></i> Ocupantes:</label>
                <textarea id="NOMBRE_OCUPANTES" name="NOMBRE_OCUPANTES" class="form-control @error('NOMBRE_OCUPANTES') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Nombre Nombre Apellido Apellido" readonly>@foreach ($ocupantes as $ocupante){{$ocupante->NOMBRES}} {{$ocupante->APELLIDOS}}
@endforeach</textarea>
                @error('NOMBRE_OCUPANTES')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            {{-- *COMUNAS* --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ORIGEN" class="form-label"><i class="fa-solid fa-map"></i> Comuna origen:</label>
                        <select id="ORIGEN" name="ORIGEN" class="form-control @error('ORIGEN') is-invalid @enderror" disabled>
                            <option value="" selected>--Seleccione una comuna--</option>
                            {{-- CAPTURAR COMUNAS Y MOSTRAR AQUI --}}
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->ID_COMUNA }}" {{ $solicitud->ORIGEN == $comuna->ID_COMUNA ? 'selected' : '' }}>
                                    {{ $comuna->COMUNA }}
                                </option>
                            @endforeach
                        </select>

                        @error('ORIGEN')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="DESTINO" class="form-label"><i class="fa-solid fa-map-location-dot"></i> Comuna destino:</label>
                        <select id="DESTINO" name="DESTINO" class="form-control @error('DESTINO') is-invalid @enderror" disabled>
                            <option value="" selected>--Seleccione una comuna--</option>
                            @foreach ($comunas as $comuna)
                                <option value="{{ $comuna->ID_COMUNA }}" {{ $solicitud->DESTINO == $comuna->ID_COMUNA ? 'selected' : '' }}>
                                    {{ $comuna->COMUNA }}
                                </option>
                            @endforeach
                        </select>

                        @error('DESTINO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="ID_TIPO_VEH" class="form-label"><i class="fa-solid fa-car-side"></i> Seleccione tipo de vehículo:</label>
                        <select id="ID_TIPO_VEH" name="ID_TIPO_VEH" class="form-control @error('ID_TIPO_VEH') is-invalid @enderror" disabled>
                            <option value="" selected>--Seleccione un tipo de vehículo--</option>

                            @foreach ($tipo_vehiculos as $tipo_vehiculo)
                                <option value="{{ $tipo_vehiculo['ID_TIPO_VEH'] }}" @if ($tipo_vehiculo['ID_TIPO_VEH'] === $solicitud->ID_TIPO_VEH) selected @endif>
                                    {{ $tipo_vehiculo['TIPO_VEHICULO'] }}
                                </option>
                            @endforeach
                        </select>

                        @error('ID_TIPO_VEH')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="PATENTE_VEHICULO" class="form-label"><i class="fa-solid fa-car-on"></i> Asignar vehículos:</label>
                        <select id="PATENTE_VEHICULO" name="PATENTE_VEHICULO" class="form-control @if($errors->has('PATENTE_VEHICULO')) is-invalid @endif" disabled>
                            <option value="">-- Seleccione el vehículo a asignar --</option>
                            @foreach ($vehiculos->groupBy('ubicacion.UBICACION') as $ubicacion => $autos)
                                <optgroup label="{{ $ubicacion }}">
                                    @foreach ($autos as $auto)
                                        <option value="{{ $auto->PATENTE_VEHICULO }}" data-tipo-vehiculo="{{ $auto->tipoVehiculo->ID_TIPO_VEH }}" @if ($auto->PATENTE_VEHICULO === $solicitud->PATENTE_VEHICULO) selected @endif>
                                            {{ $auto->PATENTE_VEHICULO }} ({{ $auto->tipoVehiculo->TIPO_VEHICULO }})
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @if($errors->has('PATENTE_VEHICULO'))
                            <div class="invalid-feedback">{{$errors->first('PATENTE_VEHICULO')}}</div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" class="form-group">
                        <label for="KMS_INICIAL" class="form-label"><i class="fa-solid fa-caret-down"></i> Kilometraje al partir:</label>
                        <input type="number" min="1" max="1000000" id="KMS_INICIAL" name="KMS_INICIAL" class="form-control" placeholder="Ej: 99999" value="{{$solicitud->KMS_INICIAL}}" required pattern="\d{1,7}">
                        @if ($errors->has('KMS_INICIAL'))
                            <div class="invalid-feedback">
                                {{ $errors->first('KMS_INICIAL') }}
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3" class="form-group">
                        <label for="KMS_FINAL" class="form-label"><i class="fa-solid fa-caret-up"></i> Kilometraje al finalizar:</label>
                        <input type="number" min="1" max="1000000" id="KMS_FINAL" name="KMS_FINAL" class="form-control" placeholder="Ej: 100000" value="{{$solicitud->KMS_FINAL}}" required pattern="\d{1,7}">
                        @if ($errors->has('KMS_FINAL'))
                            <div class="invalid-feedback">
                                {{ $errors->first('KMS_FINAL') }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- NUM BITACORA Y FECHA LLEGADA--}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" class="form-group">
                        <label for="N_BITACORA">N° Bitacora:</label>
                        <input type="number" min="0" id="N_BITACORA" name="N_BITACORA" class="form-control" placeholder="Ej: 1" value="{{$solicitud->N_BITACORA}}" required>
                    </div>
                </div>
                <div class="col-md-6" class="form-group">
                    <label for="FECHA_LLEGADA_CONDUCTOR">Fecha y hora de llegada:</label>
                    <input type="text" id="FECHA_LLEGADA_CONDUCTOR" name="FECHA_LLEGADA_CONDUCTOR" class="form-control" placeholder="Indique la fecha en que usted llegó" required>
                </div>
            </div>
            {{-- ABASTECE BENCINA Y NIVEL DE COMBUSTIBLE --}}
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3" class="form-group">
                        <label for="ABS_BENCINA">¿Abasteció bencina?: </label>
                        <select name="ABS_BENCINA" id="ABS_BENCINA" class="form-control" required>
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3" class="form-group">
                        <label for="NIVEL_TANQUE">Estado del tanque:</label>
                        <select name="NIVEL_TANQUE" id="NIVEL_TANQUE" class="form-control" required>
                            <option value="BAJO">BAJO</option>
                            <option value="MEDIO BAJO">MEDIO BAJO</option>
                            <option value="MEDIO">MEDIO</option>
                            <option value="MEDIO ALTO">MEDIO ALTO</option>
                            <option value="ALTO">ALTO</option>
                        </select>
                    </div>
                </div>
            </div>
            {{-- *FECHA Y HORA DE REGRESO* --}}
            <div class="row">
                <div class="col-md-6">
                    {{-- Fecha y hora de inicio asignadas --}}
                    <div class="form-group">
                        <label for="FECHA_SALIDA"><i class="fa-solid fa-calendar"></i> Fecha y hora de inicio asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_SALIDA" name="FECHA_SALIDA" class="form-control @error('FECHA_SALIDA') is-invalid @enderror" placeholder="Seleccione fecha y hora de inicio" required disabled value="{{$solicitud->FECHA_SALIDA}}">
                        </div>
                        @error('FECHA_SALIDA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    {{-- **Fecha y hora de término asignadas **--}}
                    <div class="form-group">
                        <label for="FECHA_LLEGADA"><i class="fa-solid fa-calendar"></i> Fecha y hora de término asignada:</label>
                        <div class="input-group">
                            <input type="text" id="FECHA_LLEGADA" name="FECHA_LLEGADA" class="form-control @error('FECHA_LLEGADA') is-invalid @enderror" placeholder="Seleccione fecha y hora de término" required disabled value="{{$solicitud->FECHA_LLEGADA }}">
                        </div>
                        @error('FECHA_LLEGADA')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- *OBSERVACIONES* --}}
            <div class="mb-3">
                <label for="OBSERV_SOL_VEH" class="form-label"><i class="fa-solid fa-file-pen"></i> Observaciones:</label>
                <textarea id="OBSERV_SOL_VEH" name="OBSERV_SOL_VEH" class="form-control @error('OBSERV_SOL_VEH') is-invalid @enderror" aria-label="With textarea" rows="5" placeholder="Escriba sus observaciones (MÁX 1000 CARACTERES)" required>{{ $solicitud->OBSERV_SOL_VEH }}</textarea>
                @error('OBSERV_SOL_VEH')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('solicitud.vehiculos.index')}}" class="btn btn-secondary" tabindex="5">Cancelar</a>
            {{-- !!COPIAR BOTON PARA REEMPLAZAR SUBMIT --}}
            <button type="button" class="btn btn-success" id="rendirBtn"><i class="fa-solid fa-check-circle"></i> Enviar formulario</button>
            <!-- Campo oculto para almacenar la contraseña -->
            <input type="hidden" name="password" id="passwordInput">
            {{-- <button type="submit" class="btn btn-primary">Enviar cambios</button> --}}
        </form>
    </div>
@stop
@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
@section('js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <script>
        const kmsInicialInput = document.getElementById('KMS_INICIAL');
        const kmsFinalInput = document.getElementById('KMS_FINAL');

        const validateInput = (input) => {
            const value = parseInt(input.value);

            // Validación de rango (1 a 1.000.000)
            if (value < 1 || value > 1000000) {
                input.value = input.defaultValue; // Restaurar valor anterior

                // Cambiar el mensaje de alerta
                const swal = Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'El valor debe estar entre 1 KM y 1.000.000 KM',
                    autoclose: 5000, // Cerrar automáticamente en 5 segundos
                });
            }

            // Validación de relación entre KMS_INICIAL y KMS_FINAL
            if (input === kmsInicialInput) {
                const kmsFinal = parseInt(kmsFinalInput.value);
                if (value > kmsFinal) {
                    kmsFinalInput.value = value; // Actualizar KMS_FINAL
                } else {
                    kmsFinalInput.min = value; // Actualizar valor mínimo de KMS_FINAL
                }
            } else {
                const kmsInicial = parseInt(kmsInicialInput.value);
                if (value < kmsInicial) {
                    input.value = kmsInicial; // Establecer KMS_FINAL igual a KMS_INICIAL
                } else {
                    kmsInicialInput.max = value; // Actualizar valor máximo de KMS_INICIAL
                }
            }
        };

        kmsInicialInput.addEventListener('input', () => validateInput(kmsInicialInput));
        kmsFinalInput.addEventListener('input', () => validateInput(kmsFinalInput));
    </script>
    <script>
        $(function () {
             // Inicializar Flatpickr para el campo de fecha y hora de inicio
             flatpickr("#FECHA_SALIDA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });

            // Inicializar Flatpickr para el campo de fecha y hora de término
            flatpickr("#FECHA_LLEGADA", {
                locale: 'es',
                enableTime: true,
                dateFormat: "Y-m-d H:i",
                // Otras opciones y configuraciones adicionales que desees utilizar
                altFormat: 'd-m-Y H:i',
                altInput: true,
            });
            $('#FECHA_SOL_VEH').flatpickr({
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
            $('#HORA_SALIDA').flatpickr({
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
            $('#HORA_LLEGADA').flatpickr({
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
        });
    </script>

    <script>
        $(document).ready(function() {
            // Validar fecha y hora de llegada
            $('#FECHA_LLEGADA_CONDUCTOR').flatpickr({
                dateFormat: 'Y-m-d H:i',
                altFormat: 'd-m-Y H:i',
                altInput: true,
                enableTime: true,
                time_24hr: true,
                locale: 'es',
                maxDate: 'today', // Establecer la fecha máxima como hoy
                minDate: new Date().fp_incr(-14), // Establecer la fecha mínima como hoy - 14 días
                showClearButton: true,
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            // Evento change del elemento ID_TIPO_VEH
            $('#ID_TIPO_VEH').change(function() {
                var selectedTipoVehiculo = $(this).val();
                // Guardar el valor seleccionado antes de cambiar el tipo de vehículo
                var previousPatenteVehiculo = $('#PATENTE_VEHICULO').val();

                $('#PATENTE_VEHICULO option').each(function() {
                    var tipoVehiculoOption = $(this).data('tipo-vehiculo');

                    if (tipoVehiculoOption == selectedTipoVehiculo) {
                        $(this).show();
                    } else {
                        $(this).hide();
                    }
                });

                // Restablecer el valor seleccionado anteriormente, en lugar de simplemente restablecer a una cadena vacía
                $('#PATENTE_VEHICULO').val(previousPatenteVehiculo);
            });
            // Desencadenar el evento change al cargar la página
            $('#ID_TIPO_VEH').trigger('change');
        });
    </script>

    <script>
        $(document).ready(function(){
            $('#ESTADO_SOL_VEH').change(function(){
                var estado = $(this).val();
                if(estado === 'POR RENDIR') {
                    $(this).prop('disabled', true);
                } else {
                    $(this).prop('disabled', false);
                }
            }).trigger('change'); // Esto va a disparar el evento de cambio al cargar la página
        });
    </script>

    <script>
        document.getElementById('rendirBtn').addEventListener('click', async function(event) {
            event.preventDefault();

            if (!validarCampos()) {
                // Mostrar un mensaje de error si la validación falla
                alert('Por favor, complete todos los campos requeridos antes de rendir.');
                return;
            }

            const { value: password } = await Swal.fire({
                title: '¿Estás seguro?',
                html: `
                    Estos datos se enviarán como firma. <br>
                    RUT: {{ Auth::user()->RUT }}<br>
                    Nombre completo: {{ Auth::user()->NOMBRES }} {{ Auth::user()->APELLIDOS }}<br>
                `,
                input: 'password',
                inputAttributes: {
                    autocapitalize: 'off',
                    required: 'true',
                    placeholder: 'Ingrese su contraseña'
                },
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar',
                inputValidator: (value) => {
                    if (!value) {
                        return 'Por favor, ingrese una contraseña válida';
                    }
                },
            });

            if (password) {
                document.getElementById('passwordInput').value = password;
                document.getElementById('rendirForm').submit();
            }
        });

        // Función para validar campos
        function validarCampos() {
            // Verificar que todos los campos requeridos estén completos
            let camposRequeridos = document.querySelectorAll('[required]');
            for (let campo of camposRequeridos) {
                if (!campo.value) {
                    return false; // Devolver falso si algún campo requerido está vacío
                }
            }
            return true; // Devolver verdadero si todos los campos requeridos están completos
        }
    </script>
@stop
