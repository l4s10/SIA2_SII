@extends('adminlte::page')

@section('title', 'Autorizar solicitudes')

@section('content_header')
    <h1 class="title">Solicitudes por autorizar</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.<div>
    </div>
    @endrole
@stop

@section('content')
    <!-- Contenedores para los mensajes -->
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @elseif (session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    confirmButtonText: 'OK',
                    confirmButtonColor: '#0064A0'
                });
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="solsalas" class="table text-justify table-bordered mt-4 mx-auto" style="white-space:nowrap;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Materiales</th> --}}
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Acciones</th>
                            {{-- <th scope="col"> Exportables</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $sol_veh)
                            <tr>
                                <td>{{ $sol_veh->NOMBRE_SOLICITANTE }}</td>
                                <td>{{ $sol_veh->RUT }}</td>
                                <td>{{ $sol_veh->DEPTO}}</td>
                                <td>{{ $sol_veh->EMAIL}}</td>
                                <td>{{ $sol_veh->ESTADO_SOL_VEH}}</td>
                                <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                                <td>{{ $sol_veh->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('solicitud.vehiculos.pdf',$sol_veh->ID_SOL_VEH) }}" method="GET" target="_blank" id="pdfForm">
                                        @csrf
                                        <!-- Botón para abrir el modal -->
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal{{ $sol_veh->ID_SOL_VEH }}"><i class="fa-regular fa-clipboard"></i> Acciones</button>
                                        <button type="submit" class="btn btn-success"><i class="fa-regular fa-file-pdf"></i> PDF</button>
                                    </form>
                                </td>
                                {{-- <td>

                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!-- Modal -->
                <div class="modal fade" id="modal{{ $sol_veh->ID_SOL_VEH }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $sol_veh->ID_SOL_VEH }}" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $sol_veh->ID_SOL_VEH }}">Detalles de la solicitud</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <h5>Solicitante</h5>
                                <p>{{ isset($sol_veh->NOMBRE_SOLICITANTE) ? $sol_veh->NOMBRE_SOLICITANTE : 'Información aún no disponible' }} - {{ isset($sol_veh->RUT) ? $sol_veh->RUT : 'Información aún no disponible' }}</p>
                                <h5>Departamento y Email</h5>
                                <p>{{ isset($sol_veh->DEPTO) ? $sol_veh->DEPTO : 'Información aún no disponible' }} - {{ isset($sol_veh->EMAIL) ? $sol_veh->EMAIL : 'Información aún no disponible' }}</p>
                                <h5>Motivo de la Solicitud</h5>
                                <p>{{ isset($sol_veh->MOTIVO_SOL_VEH) ? $sol_veh->MOTIVO_SOL_VEH : 'Información aún no disponible' }}</p>
                                <h5>Conductor</h5>
                                <p>
                                    {{ isset($sol_veh->conductor->NOMBRES) ? $sol_veh->conductor->NOMBRES . ' ' . $sol_veh->conductor->APELLIDOS : 'Información aún no disponible' }}
                                </p>
                                <h5>Fecha de ida y vuelta</h5>
                                <p>Salida: {{ \Carbon\Carbon::parse($sol_veh->FECHA_SALIDA)->format('d/m/Y H:i')}} - Llegada: {{ \Carbon\Carbon::parse($sol_veh->FECHA_LLEGADA)->format('d/m/Y H:i')}}</p>

                                <h5>Origen y Destino</h5>
                                <p>
                                    {{ isset($sol_veh->comunaOrigen) ? $sol_veh->comunaOrigen->COMUNA : 'Información aún no disponible' }}
                                    -
                                    {{ isset($sol_veh->comunaDestino) ? $sol_veh->comunaDestino->COMUNA : 'Información aún no disponible' }}
                                </p>

                                <h5>Número de Orden de Trabajo</h5>
                                <p>{{ isset($sol_veh->N_ORDEN_TRABAJO) ? $sol_veh->N_ORDEN_TRABAJO : 'Información aún no disponible' }}</p>
                                <!-- Aquí puede agregar más detalles como se necesite -->
                            </div>

                            <div class="modal-footer">
                                <form action="{{ route('solicitud.vehiculos.authorize', $sol_veh->ID_SOL_VEH) }}" method="POST" id="authorizeForm">
                                    @csrf
                                    <!-- Campo oculto para almacenar la contraseña -->
                                    <input type="hidden" name="password" id="passwordInput">
                                    <!-- Botón para abrir el modal -->
                                    <button type="button" class="btn btn-success" id="authorizeBtn" data-dismiss="modal"><i class="fa-solid fa-check-circle"></i> Autorizar</button>
                                </form>
                                <form action="{{ route('solicitud.vehiculos.reject', $sol_veh->ID_SOL_VEH) }}" method="POST" id="rejectForm">
                                    @csrf
                                    <button type="button" id="rejectBtn" class="btn btn-danger"><i class="fa-solid fa-ban"></i> Rechazar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
        <style>
        .alert1 {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #FF8C40;
            /* Color naranjo claro (RGB: 255, 214, 153) */
            color: #000000;
        }
    </style>
@stop

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#solsalas').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "order": [[5, "desc"]], // La columna 5 contiene la fecha de creación
                "columnDefs": [
                    { "orderable": false, "targets": 6 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
    <script>
        document.getElementById('authorizeBtn').addEventListener('click', async function(event) {
            event.preventDefault();

            // Mostrar u ocultar el modal actual
            $('#modal{{ $sol_veh->ID_SOL_VEH }}').modal('toggle');

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
                document.getElementById('authorizeForm').submit();
            } else {
                // Si el usuario cancela o no ingresa una contraseña, volvemos a mostrar el modal
                $('#modal{{ $sol_veh->ID_SOL_VEH }}').modal('toggle');
            }
        });

        document.getElementById('rejectBtn').addEventListener('click', function(event) {
            event.preventDefault();

            Swal.fire({
                title: 'Espera',
                text: "¿Estás seguro de rechazar la solicitud?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Sí, estoy seguro',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('rejectForm').submit();
                }
            })
        });
    </script>
@stop
