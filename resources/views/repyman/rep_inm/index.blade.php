@extends('adminlte::page')

@section('title', 'Solicitudes Inmbuebles')

@section('content_header')
    <h1 class="title">Solicitudes de reparaciones (Inmuebles)</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> En este módulo usted podrá administrar, modificar, las solicitudes de reparaciones de muebles e inmuebles.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Equipo de Soporte STI Regional:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de reparación de inmuebles.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de reparación de inmuebles.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de reparación de inmuebles..<div>
    </div>
    @endrole
@stop

@section('content')
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
            <table id="solicitudes" class="table table-bordered mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Email</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sol_reparaciones as $sol_reparacion)
                            <tr style="white-space:nowrap;">
                                <td>{{ $sol_reparacion->NOMBRE_SOLICITANTE }}</td>
                                <td>{{ $sol_reparacion->RUT }}</td>
                                <td>{{ $sol_reparacion->DEPTO}}</td>
                                <td>{{ $sol_reparacion->EMAIL}}</td>
                                <!-- Cambio de colores a los estados -->
                                <td>
                                <span class="badge rounded-pill estado-{{ strtolower(str_replace(' ', '-', $sol_reparacion->ESTADO_REP_INM)) }}">
                                {{ $sol_reparacion->ESTADO_REP_INM }}
                                </span>
                                </td>
                                <td>{{ $sol_reparacion->created_at ? $sol_reparacion->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</td>
                                <td>
                                    <form action="{{ route('reparaciones.destroy',$sol_reparacion->ID_REP_INM) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('reparaciones.show', $sol_reparacion->ID_REP_INM) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Ver</a>
                                        @role('ADMINISTRADOR|SERVICIOS')
                                            <a href="{{route('reparaciones.edit', $sol_reparacion->ID_REP_INM)}}" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
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
    <!-- Bootstrap 5 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#solicitudes').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "order": [[4, "desc"]], // La columna 5 contiene la fecha de creación
                "columnDefs": [
                    { "orderable": false, "targets": 5 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@stop
