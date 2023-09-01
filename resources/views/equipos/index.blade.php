@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>Listado de equipos</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Servicio:</strong> En esta tabla se muestra todos los equipos ya sea <strong>DISPONIBLES/ NO DISPONIBLES</strong> del sistema.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
        <div><strong>Bienvenido Informatica:</strong> En esta tabla se muestra todos los equipos ya sea <strong>DISPONIBLES/ NO DISPONIBLES</strong> del sistema.<div>
    </div>
    @endrole
@stop

@section('content')
<div class="container">
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

        <div class="table-responsive">
            <table id="equipos" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Modelo</th>
                        <th scope="col">Marca</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($equipos as $equipo)
                        <tr>
                            <td>{{ $equipo->MODELO_EQUIPO }}</td>
                            <td>{{ $equipo->MARCA_EQUIPO }}</td>
                            <td>{{ $equipo->tipoEquipo->TIPO_EQUIPO}}</td>
                            <!-- Cambio de colores a los estados -->
                            <td>
                            <span class="badge rounded-pill estado-{{ strtolower(str_replace(' ', '-', $equipo->ESTADO_EQUIPO)) }}">
                            {{ $equipo->ESTADO_EQUIPO }}
                            </span>
                            </td>
                            <td>
                                <form action="{{ route('equipos.destroy',$equipo->ID_EQUIPO) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('equipos.edit',$equipo->ID_EQUIPO)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
    <style>
        .estado-disponible {
        color: #ffffff;
        background-color: #0CB009;
        }
        .estado-no-disponible {
        color: #FFFFFF;
        background-color: #F70B0B;
        }
    </style>
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#equipos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
                });
            });
        </script>
@stop
