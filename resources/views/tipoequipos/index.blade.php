@extends('adminlte::page')

@section('title', 'Tipo equipos')

@section('content_header')
    <h1>Listado tipo equipos</h1>
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
            <table id="tipoequipos" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Tipo equipo</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->TIPO_EQUIPO }}</td>
                            <td>
                                <form action="{{ route('tipoequipos.destroy',$tipo->ID_TIPO_EQUIPOS) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/tipoequipos/{{$tipo->ID_TIPO_EQUIPOS}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
                $('#tipoequipos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 1 } // La séptima columna no es ordenable
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>

@stop
