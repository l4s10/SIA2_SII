@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar pólizas')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Pólizas de Conductores</h1>
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

        <a href="{{route('polizas.create')}}" class="btn" style="background-color: #0099FF; color: white;">Ingresar nueva póliza</a>

        <div class="table-responsive">
            <table id="polizas" class="table text-justify table-bordered mt-4 mx-auto" style="white-space:nowrap;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">N° Póliza</th>
                        <th scope="col">Conductor</th>
                        <th scope="col">Vencimiento</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($usuariosConductores as $usuario)
                        @foreach($usuario->polizas as $poliza)
                            <tr>
                                <td>{{$poliza->NRO_POLIZA}}</td>
                                <td>{{$usuario->NOMBRES}} {{$usuario->APELLIDOS}}</td>
                                <td>{{ date('d/m/Y', strtotime($poliza->FECHA_VENCIMIENTO_LICENCIA)) }}</td>
                                <td>
                                    <a href="{{route('polizas.show',$poliza->ID_POLIZA)}}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
                                </td>
                            </tr>
                        @endforeach
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
            opacity: 0.7; /* Ajusta la opacidad a tu gusto */
            background-color: #99CCFF;
            color:     #000000;
        }
    </style>
@endsection

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#polizas').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
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