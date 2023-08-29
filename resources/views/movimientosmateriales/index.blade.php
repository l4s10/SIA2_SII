@extends('adminlte::page')

@section('title', 'Materiales')

@section('content_header')
    <h1>Auditoria de materiales</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info alert1" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
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
    </div>
    <div class="table-responsive">
        <table id="movimientos" class="table table-bordered mt-4">
            <thead class="bg-primary text-white">
                <tr>
                    <!-- <th scope="col">ID</th> -->
                    <th scope="col">Usuario modificante</th>
                    <th scope="col">Tipo de movimiento</th>
                    <th scope="col">Stock previo</th>
                    <th scope="col">Stock nuevo</th>
                    <th scope="col">Detalle y/o Motivo</th>
                    <th scope="col">Fecha programada</th>
                    <th scope="col">Fecha creacion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movimientos as $movimiento)
                    <tr>
                        <td>{{$movimiento->modificante->NOMBRES.' '.$movimiento->modificante->APELLIDOS}}</td>
                        <td>{{$movimiento->TIPO_MOVIMIENTO}}</td>
                        <td>{{$movimiento->STOCK_PREVIO}}</td>
                        <td>{{$movimiento->STOCK_NUEVO}}</td>
                        <td>{{$movimiento->DETALLE_MOVIMIENTO}}</td>
                        <td>
                            {{ $movimiento->FECHA_PROGRAMADA ? \Carbon\Carbon::parse($movimiento->FECHA_PROGRAMADA)->format('d/m/Y H:i') : 'Fecha no disponible' }}
                        </td>
                        <td>{{ $movimiento->created_at ? $movimiento->created_at->format('d/m/Y H:i') : 'Fecha no disponible' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
                $('#movimientos').DataTable({
                    "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                    "responsive": true,
                    "order": [[5, "desc"]], // La columna 5 contiene la fecha de creación
                    "columnDefs": [
                        { "orderable": false, "targets": 4 } // La quinta columna no es ordenable
                    ],
                    "language": {
                        "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                    },
                });
            });
        </script>
@stop
