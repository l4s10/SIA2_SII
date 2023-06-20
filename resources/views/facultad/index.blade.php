@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar facultades')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de facultades</h1>
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
    
    <a href="{{route('facultades.create')}}" class="btn" style="background-color: #0099FF; color: white;">Ingresar nueva facultad</a>
        <div class="table-responsive">
            <table id="facultades" class="table text-justify table-bordered mt-4 mx-auto" >
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Contenido</th>
                        <th scope="col">Ley asociada</th>
                        <th scope="col">Artículo de ley</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($facultades as $facultad)
                    <tr>
                        <td>{{$facultad->NOMBRE}}</td>
                        <td>{{$facultad->CONTENIDO}}</td>
                        <td>{{$facultad->LEY_ASOCIADA}}</td>
                        <td>{{$facultad->ART_LEY_ASOCIADA}}</td>
                        <td>
                            <a href="{{route('facultades.show',$facultad->ID_FACULTAD)}}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
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
            $('#facultades').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 4 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@endsection
