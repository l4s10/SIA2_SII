@extends('adminlte::page')

@section('title', 'Materiales')

@section('content_header')
    <h1>Listado de materiales</h1>
@stop

@section('content')
    <div class="container">
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
            <table id="materiales" class="table table-bordered mt-4" style="width:100%">
                <thead class="bg-primary text-white">
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Nombre material</th>
                        <th scope="col">Tipo material</th>
                        <th scope="col">Stock</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materiales as $material)
                        <tr>
                            <td>{{ $material->NOMBRE_MATERIAL }}</td>
                            <td>{{ $material->tipoMaterial->TIPO_MATERIAL }}</td>
                            <td>{{$material->STOCK}} </td>
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
        </div>
    </div>
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