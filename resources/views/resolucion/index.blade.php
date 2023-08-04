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
        
        <a href="{{route('resolucion.create')}}" class="btn" style="background-color: #0099FF; color: white;">Ingresar nueva resolución delegatoria</a>

        <div class="table custom-table-responsive">
            <table id="resoluciones" class="table table-bordered mt-4 custom-table">
                <thead class="bg-primary text-white">
                    <tr>
                        <th scope="col">Resolución</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Tipo Resolucion</th>
                        <th scope="col">Firmante</th>
                        <th scope="col">Delegado</th>
                        <th scope="col">Facultad</th>
                        <th scope="col">Ley asociada</th>
                        <th scope="col">Glosa</th>
                        <th scope="col">Documento</th>
                        <th scope="col">Administrar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resoluciones as $resolucion)
                        <tr>
                            <td>{{ $resolucion->NRO_RESOLUCION }}</td>
                            <td>{{ date('d/m/Y', strtotime($resolucion->FECHA)) }}</td>
                            <td>{{ $resolucion->tipo->NOMBRE }}</td>
                            <td>{{ $resolucion->firmante->CARGO }}</td>
                            <td>{{ $resolucion->delegado->CARGO }}</td>
                            <td>{{ $resolucion->facultad->NOMBRE }}</td>
                            <td>{{ $resolucion->facultad->LEY_ASOCIADA }}</td>
                            <td>
                                <span class="glosa-abreviada">{{ substr($resolucion->facultad->CONTENIDO, 0, 0) }}</span>
                                <button class="btn btn-sia-primary btn-block btn-expand" data-glosa="{{ $resolucion->facultad->CONTENIDO }}">
                                    <i class="fa-solid fa-square-plus"></i>
                                </button>
                                <button class="btn btn-sia-primary btn-block btn-collapse" style="display: none;">
                                    <i class="fa-solid fa-square-minus"></i>
                                </button>
                                
                                <span class="glosa-completa" style="display: none;">{{ $resolucion->facultad->CONTENIDO }}</span>
                            </td>
                            <td>
                                @if ($resolucion->DOCUMENTO)
                                    <a href="{{ asset('storage/resoluciones/' . $resolucion->DOCUMENTO) }}" class="btn btn-sia-primary btn-block" target="_blank">
                                        <i class="fa-solid fa-file-pdf"></i>
                                    </a>
                                @else
                                    Sin documento
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('resolucion.show', $resolucion->ID_RESOLUCION) }}" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-gear"></i></a>
                            </td>
                        </tr>
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
    opacity: 0.7; 
    background-color: #99CCFF;
    color:     #000000;
    };

</style>
@endsection

@section('js')
    <!-- Para inicializar -->
    <script>
        $(document).ready(function () {
            $('#resoluciones').DataTable({
                "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]],
                "responsive": false,
                "columnDefs": [
                    { "orderable": false, "targets": 9 } // La séptima columna no es ordenable
                ],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                },
            });
        });

        // Agrega evento de clic al botón de expansión
        $('.btn-expand').on('click', function() {
            var glosaAbreviada = $(this).siblings('.glosa-abreviada');
            var glosaCompleta = $(this).siblings('.glosa-completa');
            var btnExpand = $(this);
            var btnCollapse = $(this).siblings('.btn-collapse');
    
            glosaAbreviada.hide();
            glosaCompleta.show();
            btnExpand.hide();
            btnCollapse.show();
        });
        
        // Agrega evento de clic al botón de colapso
        $('.btn-collapse').on('click', function() {
            var glosaAbreviada = $(this).siblings('.glosa-abreviada');
            var glosaCompleta = $(this).siblings('.glosa-completa');
            var btnExpand = $(this).siblings('.btn-expand');
            var btnCollapse = $(this);
    
            glosaAbreviada.show();
            glosaCompleta.hide();
            btnExpand.show();
            btnCollapse.hide();
        });
    </script>
@endsection