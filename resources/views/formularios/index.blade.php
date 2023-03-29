@extends('adminlte::page')

@section('title', 'Lista de formularios')

@section('content_header')
    <h1>Listado de Formularios</h1>
@stop

@section('content')
<div class="container">
    <!-- en el href, hacemos referencia dentro de la carpeta de vistas -->
    <!-- <a href="materiales/create" class="btn btn-primary mb-3">CREAR</a> -->
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
            <table id="formularios" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Nombre</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($formularios as $formulario)
                        <tr>
                            <td>{{ $formulario->NOMBRE_FORMULARIO}}</td>
                            <td>{{ $formulario->TIPO_FORMULARIO }}</td>
                            <td>
                                <form action="{{ route('formularios.destroy',$formulario->ID_FORMULARIO) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/formularios/{{$formulario->ID_FORMULARIO}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
    <link href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.dataTables.min.css" rel="stylesheet">
@stop

@section('js')
    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
    {{-- CONEXION CON BOOTSTRAP 5 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <!-- Agregando funciones de paginacion, busqueda, etc -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#formularios').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                
            });
        });
    </script>

@stop