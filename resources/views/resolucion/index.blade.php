@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar resoluciones')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de Resoluciones</h1>
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


        <a href="{{route('resolucion.create')}}" class="btn btn-sia-primary"> Ingresar nueva resolución delegatoria</a>
        <div class="table">
            <table id="resoluciones" class="table table-bordered mt-4">
                <thead class="bg-sia-primary">
                    <tr>
                        <th scope="col">N° Resolución</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Autoridad</th>
                        <th scope="col">Funcionario(s) Delegado(s)</th>
                        <th scope="col">Materia</th>
                        <th scope="col">Ver Documento</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resoluciones as $resolucion)
                    <tr>
                        <td>{{$resolucion->NRO_RESOLUCION}}</td>
                        <td>{{ date('d/m/Y', strtotime($resolucion->FECHA)) }}</td>
                        <td>{{$resolucion->AUTORIDAD}}</td>
                        <td>{{$resolucion->FUNCIONARIOS_DELEGADOS}}</td>
                        <td>{{$resolucion->MATERIA}}</td>
                        <td><a href="" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-file-pdf"></i></a></td>                        <td>
                            <a href="{{route('resolucion.show',$resolucion->ID_RESOLUCION)}}" class="btn btn-sia-primary btn-block" >Administrar</a>
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
            $('#resoluciones').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 6 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@endsection
