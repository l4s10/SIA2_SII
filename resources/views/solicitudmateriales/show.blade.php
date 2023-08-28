@extends('adminlte::page')

@section('title', 'Detalle de Solicitud')

@section('content_header')
    <h1 class="title">Detalle de Solicitud</h1>
@stop

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Información de la Solicitud</h3>
            </div>
            <div class="card-body">
                <!-- Mostrar información de la solicitud -->
                <p>Solicitante: {{ $sol_material->NOMBRE_SOLICITANTE }}</p>
                <p>Rut: {{ $sol_material->RUT }}</p>
                <p>Departamento: {{ $sol_material->DEPTO }}</p>
                <p>Email: {{ $sol_material->EMAIL }}</p>
                <p>Estado: {{ $sol_material->ESTADO_SOL }}</p>
                <p>Fecha de ingreso: {{ $sol_material->created_at->tz('America/Santiago')->format('d/m/Y H:i:s') }}</p>
                <p>Pedido: {{ $sol_material->MATERIAL_SOL}}</p>
                <p>Observaciones: {{ $sol_material->OBSERVACIONES }}</p>
                <p>Revisado por: {{$sol_material->MODIFICADO_POR}}</p>
            </div>
            <div class="card-footer text-center">
                <a href="{{ route('solmaterial.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                {{-- Agregar boton para confirmar la recepcion
                    -> Validar que sea la persona que solicito
                    -> Validar que el envio se haya despachado
                --}}
                @if ($sol_material->ID_USUARIO == auth()->user()->id && $sol_material->ESTADO_SOL !== 'TERMINADO')
                    <button id="btn-confirma-pedido" class=" btn btn-success"> Confirmar recepción </button>
                    {{-- ABRIR FORMULARIO QUE INDIQUE LA FECHA DE RECEPCION Y QUE APUNTE A 'UPDATE'
                    -> Para fecha de recepcion validar que minDate sea la fecha de despacho.
                    --}}
                @endif
                {{-- Solo administrador y servicios pueden revisar las solicitudes --}}
                @role('ADMINISTRADOR|SERVICIOS')
                    <a href="{{ route('solmaterial.edit', $sol_material->ID_SOLICITUD) }}" class="btn btn-primary"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                @endrole
            </div>
            <!-- Modal -->
            <div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="confirmModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="confirmModalLabel">Confirmar Recepción</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="confirm-form">
                                <div class="form-group">
                                    <label for="receive_date">Fecha de Recepción</label>
                                    <input type="text" id="receive_date" name="receive_date" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="confirm-button">Confirmar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('js')
    {{-- Listener para el boton de confirmar recepcion. --}}
    <script>
        // Inicializar Flatpickr
        $(function () {
            $('#receive_date').flatpickr({
                dateFormat: 'Y-m-d',
                altInput: true,
                altFormat: 'd-m-Y',
                locale: 'es',
                minDate: "today",
            });
        });

        // Listener para el botón de confirmar recepción
        document.getElementById('btn-confirma-pedido').addEventListener('click', function() {
            Swal.fire({
                icon: 'warning',
                title: 'Advertencia',
                text: 'Al confirmar la recepción, esta terminará y no podrá volver a ingresar otra fecha. ¿Está totalmente seguro de que ha recibido su pedido?',
                confirmButtonColor: '#0064A0',
                showCancelButton: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Abrir el modal
                    var myModal = new bootstrap.Modal(document.getElementById('confirmModal'), {
                        keyboard: false
                    });
                    myModal.show();
                }
            });
        });

        // Evento para confirmar la actualización de la fecha
        document.getElementById('confirm-button').addEventListener('click', function() {
            const receiveDate = document.getElementById('receive_date').value;
            const id = "{{ $sol_material->ID_SOLICITUD }}"; // Obtener el ID de la solicitud desde el backend

            // Validación básica
            if(!receiveDate) {
                alert('Por favor, seleccione una fecha.');
                return;
            }

            // Llamada AJAX para actualizar la fecha
            $.ajax({
                url: "{{ route('solmaterial.confirmar', '') }}/" + id,
                type: 'PUT',
                data: {
                    "_token": "{{ csrf_token() }}",
                    "FECHA_RECEPCION": receiveDate
                },
                success: function(response) {
                    // Cierra el modal y muestra un mensaje de éxito
                    var myModal = bootstrap.Modal.getInstance(document.getElementById('confirmModal'));
                    myModal.hide();
                    Swal.fire('Éxito', response.message, 'success').then(() => {
                        location.reload();
                    });
                },
                error: function(response) {
                    // Imprimir el objeto de respuesta completo en la consola
                    console.error(response);

                    // Mostrar un mensaje de error más detallado
                    let errorMessage = 'Algo salió mal';
                    if (response.responseJSON && response.responseJSON.message) {
                        errorMessage = response.responseJSON.message;
                    }

                    Swal.fire('Error', errorMessage, 'error');
                }
            });

        });
    </script>
@stop
