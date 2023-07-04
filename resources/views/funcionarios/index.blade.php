    @extends('adminlte::page')

    <!-- TITULO DE LA PESTAÑA -->
    @section('title', 'Mostrar Funcionarios')

    <!-- CABECERA DE LA PAGINA -->
    @section('content_header')
        <h1>Lista de funcionarios</h1>
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


            <a href="{{route('funcionarios.create')}}" class="btn btn-sia-primary"> Ingresar nuevo funcionario</a>
            <div class="table">
                <table id="funcionarios" class="table table-bordered mt-4">
                    <thead class="bg-sia-primary">
                        <tr>
                            <th scope="col">Nombres</th>
                            <th scope="col">Apellidos</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ubicación/Dpto</th>
                            <th scope="col">Rol</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($funcionarios as $funcionario)
                            <tr>
                                <td>{{$funcionario->NOMBRES}}</td>
                                <td>{{$funcionario->APELLIDOS}}</td>
                                <td>{{$funcionario->RUT}}</td>
                                <td>{{$funcionario->email}}</td>
                                <td>{{ $funcionario->ubicacion->UBICACION }}</td>
                                <td>{{ $funcionario->getRoleNames()->implode(', ') }}</td>
                                <td>
                                    <a href="{{route('funcionarios.show',$funcionario->id)}}" class="btn btn-sia-primary btn-block" >Administrar</a>
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
                $('#funcionarios').DataTable({
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
