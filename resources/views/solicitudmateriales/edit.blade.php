@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Revisar Solicitud')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Revisar solicitud N°{{$solicitud->ID_SOLICITUD}}</h1>
@stop

@section('content')
    <div class="container">
        <form id="form-solicitud" action="{{route('solmaterial.update', $solicitud->ID_SOLICITUD)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6" >
                    <div class="mb-3">
                    <label for="NOMBRE_SOLICITANTE" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                    <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control{{ $errors->has('NOMBRE_SOLICITANTE') ? ' is-invalid' : '' }}" value="{{$solicitud->NOMBRE_SOLICITANTE}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" @can('Nivel 2')@readonly(true) @endcan>
                    @if ($errors->has('NOMBRE_SOLICITANTE'))
                    <div class="invalid-feedback">
                        {{ $errors->first('NOMBRE_SOLICITANTE') }}
                    </div>
                    @endif
                    </div>

                    <div class="mb-3">
                    <label for="RUT" class="form-label"><i class="fa-solid fa-id-card"></i> RUT:</label>
                    <input type="text" id="RUT" name="RUT" class="form-control{{ $errors->has('RUT') ? ' is-invalid' : '' }}" value="{{ $solicitud->RUT }}" placeholder="Sin puntos con guión (Ej: 16738235-5)" @can('Nivel 2')@readonly(true) @endcan>
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
                    <input type="text" id="DEPTO" name="DEPTO" class="form-control{{ $errors->has('DEPTO') ? ' is-invalid' : '' }}" value="{{ $solicitud->DEPTO }}" placeholder="Ej: ADMINISTRACION" @can('Nivel 2')@readonly(true) @endcan>
                    @if ($errors->has('DEPTO'))
                    <div class="invalid-feedback">
                        {{ $errors->first('DEPTO') }}
                    </div>
                    @endif
                    </div>

                    <div class="mb-3">
                        <label for="EMAIL" class="form-label"><i class="fa-solid fa-envelope"></i> Email:</label>
                        <input type="email" id="EMAIL" name="EMAIL" class="form-control{{ $errors->has('EMAIL') ? ' is-invalid' : '' }}" value="{{ $solicitud->EMAIL }}" placeholder="Ej: someone@example.com" @can('Nivel 2')@readonly(true) @endcan>
                        @if ($errors->has('EMAIL'))
                        <div class="invalid-feedback">
                            {{ $errors->first('EMAIL') }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            {{-- *ESTADO DE SOLICITUD* --}}
            <div class="mb-3">
                <label for="ESTADO_SOL" class="form-label"><i class="fa-solid fa-file-circle-check"></i> Estado de la Solicitud:</label>
                <select id="ESTADO_SOL" name="ESTADO_SOL" class="form-control">
                    <option value="INGRESADO" @if ($solicitud->ESTADO_SOL == 'INGRESADO') selected @endif>🟠 Ingresado</option>
                    <option value="EN REVISION" @if ($solicitud->ESTADO_SOL == 'EN REVISION') selected @endif>🟡 En revisión</option>
                    <option value="ACEPTADO" @if ($solicitud->ESTADO_SOL == 'ACEPTADO') selected @endif>🟢 Aceptado</option>
                    <option value="EN ESPERA" @if ($solicitud->ESTADO_SOL == 'EN ESPERA') selected @endif>⚪ En espera</option>
                    <option value="RECHAZADO" @if ($solicitud->ESTADO_SOL == 'RECHAZADO') selected @endif>🔴 Rechazado</option>
                    <option value="TERMINADO" @if ($solicitud->ESTADO_SOL == 'TERMINADO') selected @endif>⚫ Terminado</option>
                </select>
            </div>

            <!-- Listado de materiales -->
            <div class="table-responsive">
                <table id="materiales" class="table table-bordered mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Tipo Material</th>
                            <th scope="col">Nombre Material</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Cantidad aprobada</th>
                            {{-- <th scope="col" hidden>Acción</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($materiales as $material)
                            <tr>
                                <td>{{ $material->tipoMaterial->TIPO_MATERIAL }}</td>
                                <td class="material-name">{{ $material->NOMBRE_MATERIAL }}</td>
                                <td>{{ $material->STOCK }}</td>
                                <td>
                                    <input type="number" class="form-control cantidad-autorizada-input" data-id="{{ $material->ID_MATERIAL }}" min="0" max="{{ $material->STOCK }}" value="0" name="cantidad_autorizada[{{ $material->ID_MATERIAL }}]">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- *CAMPO CHECKOUT* --}}
            <div class="mb-6" style="padding: 1%;">
                <div class="mb-3">
                    <label for="MATERIAL_SOL" class="form-label"><i class="fa-solid fa-file-circle-question"></i> {{$solicitud->NOMBRE_SOLICITANTE}} está solicitando:</label>
                    <textarea id="MATERIAL_SOL" name="MATERIAL_SOL" rows="5" class="form-control @if($errors->has('MATERIAL_SOL')) is-invalid @endif" placeholder="Artículos en el carrito (Máx 1000 caracteres)" readonly required>{{$solicitud->MATERIAL_SOL}}</textarea>
                    @if($errors->has('MATERIAL_SOL'))
                        <div class="invalid-feedback">{{$errors->first('MATERIAL_SOL')}}</div>
                    @endif
                </div>
                {{-- *CAMPO FECHA DESPACHO* --}}
                <div class="form-group">
                    <label for="FECHA_DESPACHO"><i class="fa-solid fa-calendar"></i> Fecha de despacho:</label>
                    <input type="text" id="FECHA_DESPACHO" name="FECHA_DESPACHO" class="form-control flatpickr @if($errors->has('FECHA_DESPACHO')) is-invalid @endif" placeholder="Ingrese fecha de despacho" data-input required value="{{ $solicitud->FECHA_DESPACHO}}">
                    @if ($errors->has('FECHA_DESPACHO'))
                        <div class="invalid-feedback">{{ $errors->first('FECHA_DESPACHO') }}</div>
                    @endif
                </div>
                {{-- *CAMPO OBSERVACIONES* --}}
                <div class="mb-3">
                    <label for="OBSERVACIONES" class="form-label"><i class="fa-solid fa-comments"></i>  Observaciones:</label>
                    <textarea id="OBSERVACIONES" name="OBSERVACIONES" class="form-control" placeholder="Solo el encargado puede ingresar observaciones">{{$solicitud->OBSERVACIONES}}</textarea>
                </div>
                {{-- *CAMPO ESCONDIDO QUE ALMACENA QUIEN REVISA SOLICITUD* --}}
                <div class="mb-3" hidden>
                    <label for="MODIFICADO_POR" class="form-label">Revisado por:</label>
                    <input type="text" id="MODIFICADO_POR" name="MODIFICADO_POR" value="{{ auth()->user()->NOMBRES}} {{auth()->user()->APELLIDOS}}">
                </div>
            </div>
            {{-- *BOTONES DE ENVIO* --}}
            <div class="mb-6">
                <!-- Campo oculto para almacenar qué botón se presionó -->
                <input type="hidden" name="accion" value="">
                <a href="{{route('solmaterial.index')}}" class="btn btn-secondary" tabindex="5"><i class="fa-solid fa-hand-point-left"></i> Cancelar</a>
                <button id="btn-enviar-cambios" type="submit" class="btn btn-primary" tabindex="4"><i class="fa-sharp fa-solid fa-paper-plane"></i> Guardar observaciones</button>
                <button id="btn-autorizar-cantidad" id="btn-restar-general" type="button" class="btn btn-info"><i class="fa-sharp fa-solid fa-paper-plane"></i> Autorizar cantidad y terminar</button>
            </div>
        </form>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop

@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    {{-- PARA CAMPO DE FECHA DE DESPACHO --}}
    <script>
        $(function () {
            $('#FECHA_DESPACHO').flatpickr({
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'd-m-Y',
                locale: 'es',
                minDate: "today",
            });
            $('#FECHA_DESPACHO').css('background-color', 'white');
        });
    </script>
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#materiales').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "columnDefs": [
                    { "orderable": false, "targets": 2 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>

    {{-- Verificar input autorizado --}}
    <script>
        // Función para verificar la cantidad autorizada
        function verificarCantidadAutorizada(input) {
            const stock = parseInt(input.getAttribute('max'));
            const cantidadAutorizada = parseInt(input.value);

            if (cantidadAutorizada > stock) {
                input.value = stock; // Establece la cantidad al valor máximo (stock)
            }
        }

        // Agrega un evento input a todos los elementos de cantidad autorizada
        document.querySelectorAll('.cantidad-autorizada-input').forEach((input) => {
            input.addEventListener('input', () => {
                verificarCantidadAutorizada(input);
            });
        });
    </script>


    {{-- PARA VERIFICAR BOTON PRESIONADO --}}
    <script>
        document.getElementById('btn-enviar-cambios').addEventListener('click', function() {
            document.getElementsByName('accion')[0].value = 'enviar_cambios';
        });
    </script>
    {{-- PARA ENVIAR CANTIDADES A LA FUNCION ALMACENADA --}}
    <script>
        function generateSummary(element) {
            let summary = '';
            element.querySelectorAll('.cantidad-autorizada-input').forEach((input) => {
                let cantidad = input.value;
                if (parseInt(cantidad) > 0) {
                    let materialName = input.closest('tr').querySelector('.material-name').textContent;
                    summary += `- ${cantidad} unidad(es) de ${materialName}\n`;
                }
            });
            return summary;
        }


        document.querySelectorAll('.cantidad-autorizada-input').forEach((input) => {
            input.addEventListener('input', () => {
                generateSummary(input.closest('table'));
            });
        });


        document.getElementById('btn-autorizar-cantidad').addEventListener('click', (e) => {
            e.preventDefault();

            let tableElement = document.getElementById('materiales');
            let summary = generateSummary(tableElement);
            if (summary === '') {
                Swal.fire({
                    icon: 'warning',
                    title: 'Advertencia',
                    text: 'No se han autorizado cantidades para ningún material.',
                    confirmButtonColor: '#E6500A',
                });
                return;
            }

            Swal.fire({
                icon: 'warning',
                title: '¿Está seguro?',
                html: `La acción de autorizar cantidades es irreversible ya que se descontarán del inventario. Por favor, confirme que desea autorizar las siguientes cantidades:<br>${summary.split('\n').map(line => `<span style="display: block;">${line}</span>`).join('')}`,
                showCancelButton: true,
                confirmButtonColor: '#0064A0',
                cancelButtonColor: '#E6500A',
                confirmButtonText: 'Sí, autorizar y terminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Cambia el estado de la solicitud a "TERMINADO" en el select
                    document.getElementById('ESTADO_SOL').value = 'TERMINADO';

                    // Cambia el valor del campo oculto 'accion' y envía el formulario
                    document.getElementsByName('accion')[0].value = 'autorizar_cantidad';
                    document.getElementById('form-solicitud').submit();
                }
            });
        });



    </script>
@stop

