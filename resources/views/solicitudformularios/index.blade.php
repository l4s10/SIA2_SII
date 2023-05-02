@extends('adminlte::page')

@section('title', 'Solicitudes formularios')

@section('content_header')
    <h1>Listado solicitudes formulario</h1>
@stop

@section('content')
<div class="container-fluid">
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
            <table id="solicitudes" class="table table-bordered mt-4" style="white-space: nowrap;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nombre solicitante</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Depto</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->NOMBRE_SOLICITANTE }}</td>
                            <td>{{ $solicitud->RUT }}</td>
                            <td>{{ $solicitud->DEPTO }}</td>
                            <td>{{ $solicitud->EMAIL }}</td>
                            <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                            <td>{{ $solicitud->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>

                            <td style="text-align:center;">
                                <form action="{{ route('formulariosSol.destroy',$solicitud->ID_SOL_FORM) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('formulariosSol.show',$solicitud->ID_SOL_FORM) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                    <a href="/formulariosSol/{{$solicitud->ID_SOL_FORM}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
                $('#solicitudes').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "order": [[4, "desc"]], // La columna 5 contiene la fecha de creación
                    "columnDefs": [
                        { "orderable": false, "targets": 5 } // La séptima columna no es ordenable
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>

@stop
