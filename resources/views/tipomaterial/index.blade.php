@extends('adminlte::page')

@section('title', 'Tipo material')

@section('content_header')
    <h1>Listado tipo material</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.<div>
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

        <div class="table-responsive">
            <table id="materiales" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Tipo material</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($tipos as $tipo)
                        <tr>
                            <td>{{ $tipo->TIPO_MATERIAL }}</td>
                            <td>
                                <form action="{{ route('tipomaterial.destroy',$tipo->ID_TIPO_MAT) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{route('tipomaterial.edit', $tipo->ID_TIPO_MAT)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#materiales').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
                });
            });
        </script>
@stop
