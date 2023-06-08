@extends('adminlte::page')

@section('title', 'Solicitar vehiculo')

@section('content_header')
    <h1>Información asociada a un Directivo</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{route('directivos.index')}}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <input type="text" name="id" value="{{auth()->user()->id}}" hidden>
                    <div class="mb-3">
                        <label for="NOMBRES" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRES" name="NOMBRES" class="form-control{{ $errors->has('NOMBRES') ? ' is-invalid' : '' }}" value="{{ auth()->user()->NOMBRES }} {{auth()->user()->APELLIDOS}}" placeholder="Ej: ANDRES RODRIGO SUAREZ MATAMALA" readonly>
                        @if ($errors->has('NOMBRES'))
                            <div class="invalid-feedback">
                                {{ $errors->first('NOMBRES') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="NOMBRES" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="NOMBRES" name="NOMBRES" class="form-control{{ $errors->has('NOMBRES') ? ' is-invalid' : '' }}" placeholder="Ej: ANDRES RODRIGO">
                        @if ($errors->has('NOMBRES'))
                            <div class="invalid-feedback">
                                {{ $errors->first('NOMBRES') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="APELLIDOS" class="form-label"><i class="fa-solid fa-user"></i> Nombre del solicitante:</label>
                        <input type="text" id="APELLIDOS" name="APELLIDOS" class="form-control{{ $errors->has('APELLIDOS') ? ' is-invalid' : '' }}" placeholder="Ej: SUAREZ MATAMALA">
                        @if ($errors->has('APELLIDOS'))
                            <div class="invalid-feedback">
                                {{ $errors->first('APELLIDOS') }}
                            </div>
                        @endif
                    </div>
                </div>
            
                <div class="modal" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Título del modal</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <p>El texto del cuerpo modal va aquí.</p>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                          <button type="button" class="btn btn-primary">Guardar cambios</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <div class="mb-3">
                    <label for="" class="form-label"><i class="fa-solid fa-user-plus"></i> Seleccione Funcionario:</label>
                    <select id="NOMBRES" name="NOMBRES" class="form-control @if($errors->has('NOMBRES')) is-invalid @endif" required autofocus>
                        <option value="" selected>--Seleccione un(a) funcionario(a):--</option>
                        {{-- *CORRECCION DE FILTRO ARREGLADO, AHORA SOLO MUESTRA CONDUCTORES DEL MISMO DEPARTAMENTO* --}}
                        @foreach ($funcionarios as $funcionario)
                                    @if ($funcionario->ID_ESCALAFON === 5)
                                        <option value="{{ $funcionario->id}}">{{ $funcionario->NOMBRES }} {{ $funcionario->APELLIDOS }}</option>
                                    @endif
                            </optgroup>
                        @endforeach
                    </select>
                    @error('NOMBRES')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
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
@stop
@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            $('#FECHA_SALIDA_SOL_VEH').flatpickr({
                dateFormat: 'Y-m-d',
                altFormat: 'd-m-Y',
                altInput: true,
                locale: 'es',
                minDate: "today",
                showClearButton: true,
                mode: "range",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_SALIDA_SOL_VEH').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
            $('#HORA_LLEGADA_SOL_VEH').flatpickr({
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                locale: "es",
                placeholder: "Seleccione la hora",
                onReady: function(selectedDates, dateStr, instance) {
                    $('#clearButton').on('click', function() {
                        instance.clear();
                    });
                }
            });
        });
    </script>
    {{-- *FUNCION PARA REFRESCAR DINAMICAMENTE EL FILTRO DE FUNCIONARIOS* --}}
    
@stop