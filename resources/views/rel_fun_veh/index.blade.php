@extends('adminlte::page')

@section('title', 'Reservas Vehiculares')

@section('content_header')
    <h1 class="title">Solicitudes de vehiculos</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> En este módulo usted podrá administrar, modificar, asignar conductor y enviar a autorizar las solicitudes de vehículos.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> En este módulo usted podrá verificar el estado de sus solicitudes y obtener la hoja de salida de vehículos totalmente autorizada y tramitada.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> En este módulo usted podrá verificar el estado de sus solicitudes y obtener la hoja de salida de vehículos totalmente autorizada y tramitada.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> En este módulo usted podrá verificar el estado de sus solicitudes y obtener la hoja de salida de vehículos totalmente autorizada y tramitada.<div>
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
    @elseif (session('info'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'info',
                    title: '{{ session('info') }}',
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
                            <th scope="col"> Exportables</th>
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
                                    <form action="{{ route('solicitud.vehiculos.destroy',$sol_veh->ID_SOL_VEH) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('solicitud.vehiculos.show',$sol_veh->ID_SOL_VEH) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                        <a href="{{route('solicitud.vehiculos.edit',$sol_veh->ID_SOL_VEH)}}" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Borrar</button>
                                    </form>
                                </td>
                                <td>
                                    <form action="{{ route('solicitud.vehiculos.pdf',$sol_veh->ID_SOL_VEH) }}" method="GET" target="_blank" id="pdfForm">
                                        @csrf
                                        <button type="submit" class="btn btn-success"><i class="fa-regular fa-file-pdf"></i> PDF</button>
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
@stop
