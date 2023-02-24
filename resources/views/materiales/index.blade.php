@extends('adminlte::page')

@section('title', 'CRUD con laravel 10')

@section('content_header')
    <h1>Listado de materiales</h1>
@stop

@section('content')
<!-- en el href, hacemos referencia dentro de la carpeta de vistas -->
    <a href="materiales/create" class="btn btn-primary mb-3">CREAR</a>
    <table id="materiales" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre material</th>
                <th scope="col">Tipo material</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($materiales as $material)
                <tr>
                    <td>{{ $material->ID_MATERIAL }}</td>
                    <td>{{ $material->NOMBRE_MATERIAL }}</td>
                    <td>{{ $material->TIPO_MATERIAL }}</td>
                    <td>
                        <form action="{{ route('materiales.destroy',$material->ID_MATERIAL) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/materiales/{{$material->ID_MATERIAL}}/edit" class="btn btn-info">Editar</a>
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