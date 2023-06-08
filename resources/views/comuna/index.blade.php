@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar comunas')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de comunas</h1>
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


        <a href="{{route('comuna.create')}}" class="btn btn-sia-primary"> Ingresar nueva comuna</a>
        <div class="table">
            <table id="comuna" class="table table-bordered mt-4">
                <thead class="bg-sia-primary">
                    <tr>
                        <th scope="col">Comuna</th>
                        <th scope="col">Region</th>
                        <th scope="col">Dirección Regional</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comunas as $comuna)
                    <tr>
                        <td>{{$comuna->COMUNA}}</td>
                        <td>{{$comuna->regionAsociada->REGION}}</td>
                        <td>{{$comuna->direccionRegionalAsociada->DIRECCION}}</td>
                        <td>
                            <a href="{{route('comuna.show',$comuna->ID_COMUNA)}}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
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
            $('#comuna').DataTable({
                "lengthMenu": [[5 ,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 3 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@endsection
