@extends('adminlte::page')

@section('title', 'Salas')

@section('content_header')
    <h1>Listado de salas</h1>
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
            <table id="salas" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Capacidad personas</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($salas as $sala)
                        <tr>
                            <td>{{ $sala->NOMBRE_SALA }}</td>
                            <td>{{ $sala->categoriaSala->CATEGORIA_SALA }}</td>
                            <td>{{ $sala->CAPACIDAD_PERSONAS }} </td>
                            <td>{{ $sala->ESTADO_SALA }} </td>
                            <td>
                                <form action="{{ route('salas.destroy',$sala->ID_SALA) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/salas/{{$sala->ID_SALA}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
                $('#salas').DataTable({
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
