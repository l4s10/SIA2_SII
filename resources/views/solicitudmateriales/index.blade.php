@extends('adminlte::page')
@section('title', 'Solicitudes Materiales')

@section('content_header')
    <h1 class="title">Solicitudes de Materiales</h1>
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


    <div class="container-fluid">
        <div class="table-responsive">
            <table id="materiales" class="table text-justify table-bordered mt-4 mx-auto" style="white-space:nowrap;">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">Solicitante</th>
                            <th scope="col">Rut</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Email</th>
                            {{-- <th scope="col">Materiales</th> --}}
                            <th scope="col">Estado</th>
                            <th scope="col">Fecha Ingreso</th>
                            {{-- <th scope="col">Observaciones</th> --}}
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($sol_materiales as $sol_material)
                            <tr>
                                <td>{{ $sol_material->NOMBRE_SOLICITANTE }}</td>
                                <td>{{ $sol_material->RUT }}</td>
                                <td>{{ $sol_material->DEPTO}}</td>
                                <td>{{ $sol_material->EMAIL}}</td>
                                <!-- Cambio de colores a los estados -->
                                <td class="estado-{{ strtolower(str_replace(' ', '-', $sol_material->ESTADO_SOL)) }}">{{ $sol_material->ESTADO_SOL }}</td>
                                <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                                <td>{{ $sol_material->created_at->tz('America/Santiago')->format('d/m/Y H:i') }}</td>
                                {{-- <td>{{ $sol_material->OBSERVACIONES}}</td> --}}
                                <td>
                                    <form action="{{ route('solmaterial.destroy',$sol_material->ID_SOLICITUD) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <a href="{{ route('solmaterial.show',$sol_material->ID_SOLICITUD) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                        @can('Nivel 2','Nivel 3')
                                        <a href="/solmaterial/{{$sol_material->ID_SOLICITUD}}/edit" class="btn btn-info"><i class="fa-regular fa-clipboard"></i> Revisar</a>
                                        @endcan
                                        @role(
                                        'ADMINISTRADOR')
                                            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i> Borrar</button>
                                        @endrole
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
        .estado-en-revision {
            color: #adad03e1;
        }
        .estado-aceptado {
            color: #00FF00;
        }
        .estado-en-espera {
            color: #afafaf;
        }
        .estado-rechazado {
            color: #FF0000;
        }
        .estado-terminado {
            color: #000000;
        }
        .estado-ingresado {
            color: #FFA500;
        }
    </style>
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto /
        background-color: #99CCFF; / Color de fondo del aviso */
        color:     #000000;
        }
    </style>
@stop

@section('js')
    <script>
        $(document).ready(function () {
            $('#materiales').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": true,
                "order": [[5, "desc"]], // La columna 5 contiene la fecha de creación
                "columnDefs": [
                    { "orderable": false, "targets": 6 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });
    </script>
@stop
