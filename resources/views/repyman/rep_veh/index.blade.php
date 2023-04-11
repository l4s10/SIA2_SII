@extends('adminlte::page')

@section('title', 'Solicitudes')

@section('content_header')
    <h1>Solicitudes de Reparaciones y Mantenciones (Vehículos)</h1>
@stop

@section('content')
<div class="container-fluid">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Exito! </strong>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dissmissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <div class="table-responsive">
            <table id="solicitudes" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Solicitante</th>
                        <th>Rut</th>
                        <th>Departamento</th>
                        <th>Email</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sol_rep_veh as $solicitud)
                        <tr>
                            <td>{{$solicitud->NOMBRE_SOLICITANTE }}</td>
                            <td>{{$solicitud->RUT}}</td>
                            <td>{{$solicitud->DEPTO}}</td>
                            <td>{{$solicitud->EMAIL}}</td>
                            <td>{{ $solicitud->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                            <td>{{$solicitud->ESTADO_SOL_REP_VEH}}</td>
                            <td>
                                <form action="{{ route('repvehiculos.destroy',$solicitud->ID_SOL_REP_VEH) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/repvehiculos/{{$solicitud->ID_SOL_REP_VEH}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Borrar</button>
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
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#solicitudes').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "order": [[4, "desc"]]
                });
            });
        </script>

@stop
