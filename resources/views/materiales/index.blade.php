@extends('adminlte::page')

@section('title', 'Materiales')

@section('content_header')
    <h1>Listado de materiales</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> En este módulo usted podrá administrar, consultar, modificar (ingresos y egresos), del inventario, este módulo cuenta con un módulo de historial para consultar los movimientos de este.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> En este módulo usted podrá administrar, consultar, modificar (ingresos y egresos), del inventario, este módulo cuenta con un módulo de historial para consultar los movimientos de este.<div>
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
        {{-- !!GENERAR REPORTE DE MATERIALES (INVENTARIO) --}}
        <a href="{{ route('materiales.exportar-pdf') }}" class="btn btn-primary" target="_blank"><i class="fa-solid fa-file-pdf"></i> Exportar PDF</a>

        <div class="table-responsive">
            <table id="materiales" class="table table-bordered mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <!-- <th scope="col">ID</th> -->
                        <th scope="col">Tipo material</th>
                        <th scope="col">Nombre material</th>
                        <th scope="col">Stock</th>
                        <th  scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($materiales as $material)
                        <tr>
                            <td>{{ $material->tipoMaterial->TIPO_MATERIAL }}</td>
                            <td>{{ $material->NOMBRE_MATERIAL }}</td>
                            <td>{{$material->STOCK}} </td>
                            <td style="text-align: center; vertical-align: middle;">
                                <form action="{{ route('materiales.destroy',$material->ID_MATERIAL) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <a href="/materiales/{{$material->ID_MATERIAL}}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
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
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #99CCFF;
            color: #000000;
        }
    </style>
        <style>
        .alert1 {
            opacity: 0.7;
            /* Ajusta la opacidad a tu gusto */
            background-color: #FF8C40;
            /* Color naranjo claro (RGB: 255, 214, 153) */
            color: #000000;
        }
    </style>
@stop

@section('js')
        <!-- Para inicializar -->
        <script>
            $(document).ready(function () {
                $('#materiales').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 3 }
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>

@stop
