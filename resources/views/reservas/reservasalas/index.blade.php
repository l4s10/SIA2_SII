@extends('adminlte::page')

@section('title', 'Solicitudes Salas')

@section('content_header')
    <h1 class="title">Reservas de salas</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
        <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.</div>
    </div>
    @endrole
    @role('REQUIRENTE')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Requirente:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de Reserva de Salas.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Servicio:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de Reserva de Salas.</div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Equipo de Soporte STI Regional:</strong> En este módulo usted podrá administrar, modificar, las solicitudes de reservas de salas.</div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Juridico:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de Reserva de Salas.</div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Funcionario:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de Reserva de Salas.</div>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $sol_sala)
                            <tr>
                                <td>{{ $sol_sala->NOMBRE_SOLICITANTE }}</td>
                                <td>{{ $sol_sala->RUT }}</td>
                                <td>{{ $sol_sala->DEPTO}}</td>
                                <td>{{ $sol_sala->EMAIL}}</td>
                                <!-- Cambio de colores a los estados -->
                                <td>
                                <span class="badge rounded-pill estado-{{ strtolower(str_replace(' ', '-', $sol_sala->ESTADO_SOL_SALA)) }}">
                                {{ $sol_sala->ESTADO_SOL_SALA }}
                                </span>
                                </td>
                                <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                                <td>{{ $sol_sala->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('solicitud.salas.destroy',$sol_sala->ID_SOL_SALA) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('solicitud.salas.show',$sol_sala->ID_SOL_SALA) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                        @role('ADMINISTRADOR|INFORMATICA')
                                            <a href="{{route('solicitud.salas.edit',$sol_sala->ID_SOL_SALA)}}" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                                        @endrole
                                        @role('ADMINISTRADOR')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Borrar</button>
                                        @endrole
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .alert {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #99CCFF;
            color: #000000;
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
        <style>
        .estado-en-revision {
        color: #000000;
        background-color: #F7F70B;
        }

        .estado-aceptado {
        color: #ffffff;
        background-color: #0CB009;
        }

        .estado-por-rendir {
        color: #ffffff;
        background-color: #7E7E7E;
        }

        .estado-rechazado {
        color: #FFFFFF;
        background-color: #F70B0B;
        }

        .estado-por-autorizar {
        color: #000000;
        background-color: #d9d9d9;
        }

        .estado-ingresado {
        color: #000000;
        background-color: #FFA600;
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
@stop
