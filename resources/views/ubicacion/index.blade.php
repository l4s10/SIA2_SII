@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar ubicaciones y departamentos')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de ubicaciones y departamentos</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
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
    
    <a href="{{route('ubicacion.create')}}" class="btn" style="background-color: #0099FF; color: white;">Ingresar nueva ubicación o departamento</a>
        <div class="table-responsive">
            <table id="ubicacion" class="table table-bordered mt-4 custom-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Ubicacion/Departamento</th>
                        <th scope="col">Dependencia</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ubicaciones as $ubicacion)
                        <tr>
                            <td>{{ $ubicacion->UBICACION }}</td>
                            <td>{{ $ubicacion->DIRECCION }}</td>
                            <td>
                                <a href="{{ route('ubicacion.show', $ubicacion->ID_UBICACION) }}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <style>
        .alert {
        opacity: 0.7; 
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
@endsection

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#ubicacion').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 2 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@endsection
