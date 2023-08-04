@extends('adminlte::page')

@section('title', 'busqueda de resoluciones')

@section('content_header')
    <h1>Búsqueda Avanzada de Resoluciones Delegatorias de Facultades</h1>
@stop

@section('content')
    <div class="container">
        <form id="searchForm" action="{{ route('busquedaavanzada.index') }}" method="GET">
            @csrf

            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="NRO_RESOLUCION" class="form-label"><i class="fas fa-bookmark"></i> Número de Resolución:</label>
                    <select id="NRO_RESOLUCION" name="NRO_RESOLUCION" class="form-control" disabled>
                        <option value="" selected>--Seleccione Nro--</option>
                        @foreach ($nros as $nro)
                            <option value="{{ $nro->NRO_RESOLUCION }}">{{ $nro->NRO_RESOLUCION }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[NRO_RESOLUCION]" value="NRO_RESOLUCION" id="filter_NRO_RESOLUCION">
                        <label class="form-check-label" for="filter_NRO_RESOLUCION">Incluir como filtro de búsqueda</label>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="ID_TIPO" class="form-label"><i class="fas fa-bookmark"></i> Tipo Resolución:</label>
                    <select id="ID_TIPO" name="ID_TIPO" class="form-control" disabled>
                        <option value="" selected>--Seleccione Tipo--</option>
                        @foreach ($tipos as $tipo)
                            <option value="{{ $tipo->ID_TIPO }}">{{ $tipo->NOMBRE }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[ID_TIPO]" value="ID_TIPO" id="filter_ID_TIPO">
                        <label class="form-check-label" for="filter_ID_TIPO">Incluir como filtro de búsqueda</label>
                    </div>
                </div>
            

                <div class="col-md-3 form-group">
                    <label for="FECHA" class="form-label"><i class="fas fa-bookmark"></i> Fecha:</label>
                    <select id="FECHA" name="FECHA" class="form-control @error('FECHA') is-invalid @enderror" disabled>
                        <option value="" selected>--Seleccione Fecha--</option>
                        @foreach ($fechas as $fecha)
                            <option value="{{ $fecha->FECHA }}">{{ date('d-m-Y', strtotime($fecha->FECHA)) }}</option>
                        @endforeach
                    </select>
                    @error('FECHA')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[FECHA]" value="FECHA" id="filter_FECHA">
                        <label class="form-check-label" for="filter_FECHA">Incluir como filtro de búsqueda</label>                    
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="ID_FACULTAD" class="form-label"><i class="fas fa-bookmark"></i> Facultad:</label>
                    <select id="ID_FACULTAD" name="ID_FACULTAD" class="form-control" disabled>
                        <option value="" selected>--Seleccione Facultad--</option>
                        @foreach ($facultades as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->NOMBRE }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[ID_FACULTAD]" value="ID_FACULTAD" id="filter_ID_FACULTAD">
                        <label class="form-check-label" for="filter_ID_FACULTAD">Incluir como filtro de búsqueda</label>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-3 form-group">
                    <label for="LEY_ASOCIADA" class="form-label"><i class="fas fa-bookmark"></i> Ley asociada:</label>
                    <select id="LEY_ASOCIADA" name="LEY_ASOCIADA" class="form-control" disabled>
                        <option value="" selected>--Seleccione Ley--</option>
                        @foreach ($facultades->unique('LEY_ASOCIADA') as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->LEY_ASOCIADA }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[LEY_ASOCIADA]" value="LEY_ASOCIADA" id="filter_LEY_ASOCIADA">
                        <label class="form-check-label" for="filter_LEY_ASOCIADA">Incluir como filtro de búsqueda</label>
                    </div>
                </div>
                

                
                <div class="col-md-3 form-group">
                    <label for="ART_LEY_ASOCIADA" class="form-label"><i class="fas fa-bookmark"></i> Artículo de ley:</label>
                    <select id="ART_LEY_ASOCIADA" name="ART_LEY_ASOCIADA" class="form-control" disabled>
                        <option value="" selected>--Seleccione Artículo--</option>
                        @foreach ($facultades->unique('ART_LEY_ASOCIADA') as $facultad)
                            <option value="{{ $facultad->ID_FACULTAD }}">{{ $facultad->ART_LEY_ASOCIADA }}</option>
                        @endforeach
                    </select>
                    @error('ART_LEY_ASOCIADA')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[ART_LEY_ASOCIADA]" value="ART_LEY_ASOCIADA" id="filter_ART_LEY_ASOCIADA">
                        <label class="form-check-label" for="filter_ART_LEY_ASOCIADA">Incluir como filtro de búsqueda</label>
                    </div>
                </div>
                


                <div class="col-md-3 form-group">
                    <label for="ID_FIRMANTE" class="form-label"><i class="fas fa-bookmark"></i> Firmante:</label>
                    <select id="ID_FIRMANTE" name="ID_FIRMANTE" class="form-control" disabled>
                        <option value="" selected>--Seleccione Firmante--</option>
                        @foreach ($firmantes as $idFirmante => $nombreFirmante)
                            <option value="{{ $idFirmante }}">{{ $nombreFirmante }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[ID_FIRMANTE]" value="ID_FIRMANTE" id="filter_ID_FIRMANTE">
                        <label class="form-check-label" for="filter_ID_FIRMANTE">Incluir como filtro de búsqueda</label>
                    </div>
                </div>

                <div class="col-md-3 form-group">
                    <label for="ID_DELEGADO" class="form-label"><i class="fas fa-bookmark"></i> Delegado:</label>
                    <select id="ID_DELEGADO" name="ID_DELEGADO" class="form-control" disabled>
                        <option value="" selected>--Seleccione Delegado--</option>
                        @foreach ($delegados as $idCargo => $nombreDelegado)
                            <option value="{{ $idCargo }}">{{ $nombreDelegado }}</option>
                        @endforeach
                    </select>
                    <div class="form-check mt-2">
                        <input class="form-check-input" type="checkbox" name="selectedFilters[ID_DELEGADO]" value="ID_DELEGADO" id="filter_ID_DELEGADO">
                        <label class="form-check-label" for="filter_ID_DELEGADO">Incluir como filtro de búsqueda</label>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary" name="buscar"><i class="fas fa-search"></i> Buscar</button>
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
                                    @if ($resolucion->DOCUMENTO)
                                        <a href="{{ asset('storage/resoluciones/' . $resolucion->DOCUMENTO) }}" class="btn btn-sia-primary btn-block" target="_blank">
                                            <i class="fa-solid fa-file-pdf"></i>
                                        </a>
                                    @else
                                        Sin documento
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div style="margin-top: 60px;"></div> <!-- Espacio entre las funcionalidades -->
            <div class="alert alert-info">Ingrese algún parámetro para obtener resoluciones</div>
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
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function () {
            // Configuración checkboxes

            // Obtén todos los checkboxes y selects
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const selects = document.querySelectorAll('select');

            // Recorre los checkboxes y agrega el evento de cambio
            checkboxes.forEach((checkbox) => {
                checkbox.addEventListener('change', (event) => {
                    const checkbox = event.target;
                    const select = document.querySelector(`select#${checkbox.getAttribute('id').replace('filter_', '')}`);

                    if (checkbox.checked) {
                        select.disabled = false; // Habilita el select
                    } else {
                        select.disabled = true; // Deshabilita el select
                    }
                });
            });

            // Configuración botón '+' o '-' de la glosa en la tabla:
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
            

            $('#resoluciones').DataTable({
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "responsive": true,
                "columnDefs": [{
                    "orderable": false,
                    "targets": 9
                }],
                "language": {
                    "url": "https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json"
                }
            });
        });
    </script>
@stop