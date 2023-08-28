@extends('adminlte::page')

@section('title', 'Solicitudes formularios')

@section('content_header')
    <h1>Listado solicitudes formulario</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de formularios.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de formularios.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> En este módulo usted podrá verificar el estado de sus solicitudes de formularios.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong>  En este módulo usted podrá verificar el estado de sus solicitudes de formularios.<div>
    </div>
    @endrole

@stop

@section('content')
    <div class="verde">
        <div><i class="fas fa-seedling"></i>Cuidemos el medio ambiente <i class="fas fa-seedling"></i>. Recuerde que se debe priorizar los formularios con uso cero papel.</div>
    </div>
    <br>
    <div class="container-fluid">
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
            <table id="solicitudes" class="table table-bordered mt-4" style="white-space: nowrap;">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Nombre solicitante</th>
                        <th scope="col">Rut</th>
                        <th scope="col">Depto</th>
                        <th scope="col">Email</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($solicitudes as $solicitud)
                        <tr>
                            <td>{{ $solicitud->NOMBRE_SOLICITANTE }}</td>
                            <td>{{ $solicitud->RUT }}</td>
                            <td>{{ $solicitud->DEPTO }}</td>
                            <td>{{ $solicitud->EMAIL }}</td>
                            <!-- Carbon sirve para parsear datos, esta es una instancia de carbon -->
                            <td>{{ $solicitud->created_at ? $solicitud->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</td>
                            <td style="text-align:center;">
                                <form action="{{ route('formulariosSol.destroy',$solicitud->ID_SOL_FORM) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="{{ route('formulariosSol.show',$solicitud->ID_SOL_FORM) }}" class="btn btn-primary"><i class="fa-regular fa-eye"></i> Ver</a>
                                    @role('ADMINISTRADOR|SERVICIOS')
                                        <a href="{{route('formulariosSol.edit',$solicitud->ID_SOL_FORM)}}" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                                    @endrole
                                    @role('ADMINISTRADOR')
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
        .alert {
            opacity: 0.7; /* Ajusta la opacidad a tu gusto */
            background-color: #99CCFF;
            color: #000000;
        }

        .alert1 {
            opacity: 0.7; /* Ajusta la opacidad a tu gusto */
            background-color: #FF8C40;
            color: #000000;
        }

        .verde {
            display: flex;
            justify-content: center;
            height: 6vh; /* Ajusta la altura como desees */
            align-items: center;
            padding: 10px;
            background-color: #40C47C;
            color: #FFFFFF;
            border-radius: 10px;
            font-size: 16px; /* Tamaño de fuente */
            text-align: center; /* Alineación del texto */
            overflow: hidden;
        }

        .verde i {
            margin: 0 5px; /* Espacio entre los íconos y el texto */
            margin-right: 10px;
        }
</style>
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#solicitudes').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "order": [[4, "desc"]], // La columna 5 contiene la fecha de creación
                    "columnDefs": [
                        { "orderable": false, "targets": 5 } // La séptima columna no es ordenable
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>

@stop
