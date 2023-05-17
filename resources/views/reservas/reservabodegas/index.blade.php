@extends('adminlte::page')

@section('title', 'Solicitudes Bodegas')

@section('content_header')
    <h1 class="title">Solicitudes de Bodegas</h1>
@stop

@section('content')
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
    <div class="container-fluid">
        <div class="table-responsive">
            <table id="solbodegas" class="table text-justify table-bordered mt-4 mx-auto" style="white-space:nowrap;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Materiales</th> --}}
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($solicitudes as $sol_bodega)
                            <tr>
                                <td>{{ $sol_bodega->NOMBRE_SOLICITANTE }}</td>
                                <td>{{ $sol_bodega->RUT }}</td>
                                <td>{{ $sol_bodega->DEPTO}}</td>
                                <td>{{ $sol_bodega->EMAIL}}</td>
                                <td>{{ $sol_bodega->ESTADO_SOL_BODEGA}}</td>
                                <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                                <td>{{ $sol_bodega->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                                <td>
                                    <form action="{{ route('solicitud.bodegas.destroy',$sol_bodega->ID_SOL_BODEGA) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('solicitud.bodegas.show',$sol_bodega->ID_SOL_BODEGA) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                        @role('ADMINISTRADOR|INFORMATICA')
                                        <a href="{{route('solicitud.bodegas.edit',$sol_bodega->ID_SOL_BODEGA)}}" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                                        @endrole
                                        @role('ADMINISTRADOR')
                                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Borrar</button>
                                        @endrole
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
            $('#solbodegas').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "order": [[5, "desc"]], // La columna 5 contiene la fecha de creación
                "columnDefs": [
                    { "orderable": false, "targets": 6 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@stop
