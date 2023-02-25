@extends('adminlte::page')

@section('title', 'Vehículos')

@section('content_header')
    <h1>Listado de vehículos</h1>
@stop

@section('content')
<!-- en el href, hacemos referencia dentro de la carpeta de vistas -->
    <a href="vehiculos/create" class="btn btn-primary mb-3">Ingresar nuevo vehículo</a>
    <table id="vehiculos" class="table table-bordered shadow-lg mt-4" style="width:100%">
        <thead class="bg-primary text-white">
            <tr>
                <th scope="col">Patente</th>
                <th scope="col">Tipo</th>
                <th scope="col">Marca</th>
                <th scope="col">Modelo</th>
                <th scope="col">Año</th>
                <th scope="col">Unidad</th>
                <th scope="col">Estado</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($vehiculos as $vehiculo)
                <tr>
                    <td>{{ $vehiculo->PATENTE_VEHICULO }}</td>
                    <td>{{ $vehiculo->TIPO_VEHICULO }}</td>
                    <td>{{ $vehiculo->MARCA }}</td>
                    <td>{{ $vehiculo->MODELO_VEHICULO }}</td>
                    <td>{{ $vehiculo->ANO_VEHICULO }}</td>
                    <td>{{ $vehiculo->UNIDAD_VEHICULO }}</td>
                    <td>{{ $vehiculo->ESTADO_VEHICULO }}</td>
                    <td>
                        <form action="{{ route('vehiculos.destroy',$vehiculo->PATENTE_VEHICULO) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="/vehiculos/{{$vehiculo->PATENTE_VEHICULO}}/edit" class="btn btn-info">Editar</a>
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
                $('#vehiculos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>

@stop