@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar regiones')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de regiones</h1>
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


        <a href="{{route('region.create')}}" class="btn btn-sia-primary"> Ingresar nueva región</a>
        <div class="table">
            <table id="region" class="table table-bordered mt-4">
                <thead class="bg-sia-primary">
                    <tr>
                        <th scope="col">Nombres</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($regiones as $region)
                    <tr>
                        <td>{{$region->REGION}}</td>
                        <td>
                            <a href="{{route('region.show',$region->ID_REGION)}}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('css')
    {{-- Probando colores personalizados --}}
    <link rel="stylesheet" href="{{asset('vendor/adminlte/dist/css/custom.css')}}">
@endsection

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#region').DataTable({
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
@endsection
