@extends('adminlte::page')

@section('title', 'Solicitudes Inmbuebles')

@section('content_header')
    <h1 class="title">Solicitudes de reparaciones (Inmuebles)</h1>
@stop

@section('content')
    <!-- Contenedores para los mensajes -->
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
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="solicitudes" class="table table-bordered mt-4">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Email</th>
                            {{-- Colocar campps de formulario --}}
                            {{-- <th scope="col">Tipo reparación</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Observaciones</th> --}}
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
                                {{-- agregando campos de formulario --}}
                                {{-- <td>{{ $sol_reparacion->ID_TIPO_REP_GENERAL}}</td>
                                <td>{{ $sol_reparacion->REP_SOL}}</td>
                                <td>{{ $sol_reparacion->ESTADO_REP_INM}}</td>
                                <td>{{ $sol_reparacion->OBSERV_REP_INM}}</td> --}}
                                <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                                <td>{{ $sol_reparacion->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('reparaciones.destroy',$sol_reparacion->ID_REP_INM) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('reparaciones.show', $sol_reparacion->ID_REP_INM) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i> Ver</a>
                                        <a href="/reparaciones/{{$sol_reparacion->ID_REP_INM}}/edit" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
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
                "order": [[4, "desc"]]
            });
        });
    </script>
@stop
