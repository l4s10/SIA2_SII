@extends('adminlte::page')

@section('title', 'busqueda de resoluciones')

@section('content_header')
    <h1>Búsqueda avanzada de resoluciones delegatorias</h1>
@stop

@section('content')
    <div class="container">
        <form id="searchForm" action="{{ route('busquedaavanzada.index') }}" method="GET">
            @csrf

            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="NRO_RESOLUCION" class="form-label"><i class="fa-solid fa-bookmark"></i> Número de Resolución:</label>
                    <select id="NRO_RESOLUCION" name="NRO_RESOLUCION" class="form-control @error('NRO_RESOLUCION') is-invalid @enderror">
                        <option value="" selected>--Seleccione Nro--</option>
                        @foreach ($nros as $nro)
                        <option value="{{ $nro->NRO_RESOLUCION }}">{{ $nro->NRO_RESOLUCION }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarNro" class="btn btn-primary btn-block">Buscar por Número</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_TIPO" class="form-label"><i class="fa-solid fa-bookmark"></i> Tipo Resolución:</label>
                    <select id="ID_TIPO" name="ID_TIPO" class="form-control @error('ID_TIPO') is-invalid @enderror">
                        <option value="" selected>--Seleccione Tipo--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->ID_TIPO }}">{{ $tipo->NOMBRE }}</option>
                        @endforeach
                    </select>
                    @error('ID_TIPO')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarTipo" class="btn btn-primary btn-block">Buscar por Tipo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="FECHA" class="form-label"><i class="fa-solid fa-bookmark"></i> Fecha:</label>
                    <select id="FECHA" name="FECHA" class="form-control @error('FECHA') is-invalid @enderror">
                        <option value="" selected>--Seleccione Tipo--</option>
                        @foreach ($fechas as $fecha)
                            <option value="{{ $fecha->FECHA }}">{{ date('d-m-Y', strtotime($fecha->FECHA)) }}</option>
                        @endforeach
                    </select>
                    @error('FECHA')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarFecha" class="btn btn-primary btn-block">Buscar por Fecha</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_FACULTAD" class="form-label"><i class="fa-solid fa-bookmark"></i> Facultad:</label>
                    <select id="ID_FACULTAD" name="ID_FACULTAD" class="form-control @error('ID_FACULTAD') is-invalid @enderror">
                        <option value="" selected>--Seleccione Facultad--</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->NOMBRE }}</option>
                        @endforeach
                    </select>
                    @error('ID_FACULTAD')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarFacultad" class="btn btn-primary btn-block">Buscar por Facultad</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_LEY" class="form-label"><i class="fa-solid fa-bookmark"></i> Ley asociada:</label>
                    <select id="ID_LEY" name="ID_LEY" class="form-control @error('ID_LEY') is-invalid @enderror">
                        <option value="" selected>--Seleccione Ley--</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->LEY_ASOCIADA }}</option>
                        @endforeach
                    </select>
                    @error('ID_LEY')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarLey" class="btn btn-primary btn-block">Buscar por Ley</button>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_ART_LEY" class="form-label"><i class="fa-solid fa-bookmark"></i> Artículo de ley:</label>
                    <select id="ID_ART_LEY" name="ID_ART_LEY" class="form-control @error('ID_ART_LEY') is-invalid @enderror">
                        <option value="" selected>--Seleccione Artículo--</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->ART_LEY_ASOCIADA }}</option>
                        @endforeach
                    </select>
                    @error('ID_ART_LEY')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarArticulo" class="btn btn-primary btn-block">Buscar por Artículo</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_FIRMANTE" class="form-label"><i class="fa-solid fa-bookmark"></i> Firmante:</label>
                    <select id="ID_FIRMANTE" name="ID_FIRMANTE" class="form-control @error('ID_FIRMANTE') is-invalid @enderror">
                        <option value="" selected>--Seleccione Firmante--</option>
                        @foreach ($firmantes as $firmante)
                            <option value="{{ $firmante->ID_CARGO }}">{{ $firmante->CARGO }}</option>
                        @endforeach
                    </select>
                    @error('ID_FIRMANTE')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarFirmante" class="btn btn-primary btn-block">Buscar por Firmante</button>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9 form-group">
                    <label for="ID_DELEGADO" class="form-label"><i class="fa-solid fa-bookmark"></i> Delegado:</label>
                    <select id="ID_DELEGADO" name="ID_DELEGADO" class="form-control @error('ID_DELEGADO') is-invalid @enderror">
                        <option value="" selected>--Seleccione Delegado--</option>
                        @foreach ($delegados as $delegado)
                            <option value="{{ $delegado->ID_CARGO }}">{{ $delegado->CARGO }}</option>
                        @endforeach
                    </select>
                    @error('ID_DELEGADO')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-3 form-group d-flex align-items-end">
                    <button id="BuscarDelegado" class="btn btn-primary btn-block">Buscar por Delegado</button>
                </div>
            </div>
            
        </form>


        @if(count($resoluciones) > 0)
            <div class="table-responsive">
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
                            <th scope="col">Artículo de ley</th>
                            <th scope="col">Glosa</th>
                            <th scope="col">Documento</th>
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
                                <td>{{ $resolucion->facultad->ART_LEY_ASOCIADA }}</td>

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
                                    <a href="" class="btn btn-sia-primary btn-block"><i class="fa-solid fa-file-pdf"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info">No se encontraron resoluciones.</div>
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-TDt7dKgGsPvwsSTcc2CC7SE2/w7Px6CoaGh7fFA13iP8/wx4NSJ8G4PkiUmcnqC4E6F3jTQFJOU2gUTr0lXG2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>
        .textarea-container {
            margin-top: 10px; /* Ajusta el valor según sea necesario */
        }
    </style>
        <style>
        .alert {
        opacity: 0.7; 
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>

    
@stop

@section('js')
    <!-- Incluir archivos JS flatpicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            // Agrega evento de clic al botón de expansión
            $('.btn-expand').on('click', function () {
                var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                var glosaCompleta = $(this).siblings('.glosa-completa');
                var btnExpand = $(this);
                var btnCollapse = $(this).siblings('.btn-collapse');

                glosaAbreviada.hide();
                glosaCompleta.show();
                btnExpand.hide();
                btnCollapse.show();
                //$(this).hide();
            });

            // Agregar evento de clic al botón de colapso
            $('.btn-collapse').on('click', function () {
                    var glosaAbreviada = $(this).siblings('.glosa-abreviada');
                    var glosaCompleta = $(this).siblings('.glosa-completa');
                    var btnExpand = $(this).siblings('.btn-expand');
                    var btnCollapse = $(this);

                    glosaAbreviada.show();
                    glosaCompleta.hide();
                    btnExpand.show();
                    btnCollapse.hide();
                });
            });
    </script>
@stop