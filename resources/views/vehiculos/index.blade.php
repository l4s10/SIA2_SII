@extends('adminlte::page')

@section('title', 'Vehículos')

@section('content_header')
    <h1>Listado de vehículos</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.<div>
    </div>
    @endrole

@stop

@section('content')
    <div class="container">
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

    <a href="{{route('vehiculos.create')}}" class="btn btn-primary"> Ingresar nuevo vehiculo</a>
        <div class="table-responsive">
            <!-- en el href, hacemos referencia dentro de la carpeta de vistas -->
            {{-- <a href="vehiculos/create" class="btn btn-primary mb-3">Ingresar nuevo vehículo</a> --}}
            <table id="vehiculos" class="table table-bordered mt-4" style="width:100%; white-space:nowrap;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Patente</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Modelo</th>
                        <th scope="col">Año</th>
                        <th scope="col">Ubicacion</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($vehiculos as $vehiculo)
                        <tr>
                            <td>{{ $vehiculo->PATENTE_VEHICULO }}</td>
                            <td>{{ $vehiculo->tipoVehiculo->TIPO_VEHICULO }}</td>
                            <td>{{ $vehiculo->MARCA }}</td>
                            <td>{{ $vehiculo->MODELO_VEHICULO }}</td>
                            <td>{{ $vehiculo->ANO_VEHICULO }}</td>
                            <td>{{ $vehiculo->ubicacion->UBICACION }}</td>
                            <td>{{ $vehiculo->ESTADO_VEHICULO }}</td>
                            <td>
                                <form action="{{ route('vehiculos.destroy',$vehiculo->ID_VEHICULO) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('vehiculos.edit',$vehiculo->ID_VEHICULO)}}" class="btn btn-info">Editar</a>
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
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#vehiculos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 7 } // La séptima columna no es ordenable
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>

@stop
