@extends('adminlte::page')

@section('title', 'Solicitudes Materiales')

@section('content_header')
    <h1 class="title">Solicitudes de Materiales</h1>
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

    <table id="materiales" class="table table-responsive table-bordered mt-4" style="width:100%;">
            <thead class="bg-primary text-white">
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Solicitante</th>
                    <th scope="col">Rut</th>
                    <th scope="col">Departamento</th>
                    <th scope="col">Email</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Materiales</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ingreso</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sol_materiales as $sol_material)
                    <tr>
                        <td>{{ $sol_material->NOMBRE_SOLICITANTE }}</td>
                        <td>{{ $sol_material->RUT}}</td>
                        <td>{{ $sol_material->DEPTO}}</td>
                        <td>{{ $sol_material->EMAIL}}</td>
                        <td>{{ $sol_material->TIPO_MAT_SOL}}</td>
                        <td>{{ $sol_material->MATERIAL_SOL}}</td>
                        <td>{{ $sol_material->ESTADO_SOL}}</td>
                        <td>{{ $sol_material->created_at}}</td>
                        <td>
                            <form action="{{ route('solmaterial.destroy',$sol_material->ID_SOLICITUD) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <a href="/solmaterial/{{$sol_material->ID_SOLICITUD}}/edit" class="btn btn-info">Administrar</a>
                                <button type="submit" class="btn btn-danger">Borrar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#materiales').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>

@stop