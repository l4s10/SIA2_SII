@extends('adminlte::page')

@section('title', 'Equipos')

@section('content_header')
    <h1>Listado de equipos</h1>
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
                            <td>{{ $equipo->ESTADO_EQUIPO }}</td>
                            <td>
                                <form action="{{ route('equipos.destroy',$equipo->ID_EQUIPO) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/equipos/{{$equipo->ID_EQUIPO}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#equipos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>
@stop
