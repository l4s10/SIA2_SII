@extends('adminlte::page')

@section('title', 'Lista de formularios')

@section('content_header')
    <h1>Listado de Formularios</h1>
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
@stop

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#formularios').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 2 }
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>

@stop
