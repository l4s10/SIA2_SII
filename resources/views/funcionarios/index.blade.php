@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Mostrar Funcionarios')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Lista de funcionarios</h1>
@stop

@section('content')
    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Exito! </strong>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif


        @if(session('error'))
            <div class="alert alert-danger alert-dissmissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
        @endif
        <a href="{{route('funcionarios.create')}}" class="btn btn-sia-primary"> Ingresar nuevo funcionario</a>
        <div class="table-reponsive">
            <table id="funcionarios" class="table table-bordered mt-4">
                <thead class="bg-sia-primary">
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Departamento</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($funcionarios as $funcionario)
                        <tr>
                            <td>{{$funcionario->name}}</td>
                            <td>{{$funcionario->rut}}</td>
                            <td>{{$funcionario->email}}</td>
                            <td>{{$funcionario->depto}}</td>
                            <td>(AQUI VA EL ROL)</td>
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
@endsection

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#funcionarios').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "columnDefs": [
                    { "orderable": false, "targets": 5 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@endsection
