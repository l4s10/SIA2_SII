@extends('adminlte::page')

@section('title', 'Modificar Resolución Delegatoria')

@section('content_header')
    <h1>Modificar Resolución Delegatoria</h1>
@stop

@section('content')
    <div class="container">
        <form action="{{ route('resolucion.update', $resolucion->ID_RESOLUCION) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col">
                    <div class="form-group">
                        <label for="NRO_RESOLUCION">N° Resolución:</label>
                        <input type="text" name="NRO_RESOLUCION" id="NRO_RESOLUCION" class="form-control" placeholder="N° Resolución (Ej: 1234)" value="{{ $resolucion->NRO_RESOLUCION }}" required autofocus>
                        @error('NRO_RESOLUCION')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="FECHA" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Fecha:</label>
                        <input type="text" class="form-control{{ $errors->has('FECHA') ? ' is-invalid' : '' }}" id="FECHA" name="FECHA" value="{{ old('FECHA', $resolucion->FECHA) }}" placeholder="Ej: 1996-08-24" required>
                        @if ($errors->has('FECHA'))
                            <div class="invalid-feedback">
                                {{ $errors->first('FECHA') }}
                            </div>
                        @endif
                    </div>

                    <div class="mb-3">
                        <label for="ID_TIPO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Tipo de Resolución:</label>
                        <select id="ID_TIPO" name="ID_TIPO" class="form-control @error('ID_TIPO') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione Tipo de Resolución--</option>
            
                            @foreach ($tiposResolucion as $idTipoResolucion => $nombreTipoResolucion)
                                <option value="{{ $idTipoResolucion }}" {{ $resolucion->ID_TIPO == $idTipoResolucion ? 'selected' : '' }}>
                                    {{ $nombreTipoResolucion }}
                                </option>
                            @endforeach
            
                        </select>
            
                        @error('ID_TIPO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ID_FIRMANTE" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Firmante:</label>
                        <select id="ID_FIRMANTE" name="ID_FIRMANTE" class="form-control @error('ID_FIRMANTE') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione Firmante--</option>

                            @foreach ($firmantes as $idFirmante => $nombreFirmante)
                                <option value="{{ $idFirmante }}" {{ $resolucion->ID_FIRMANTE == $idFirmante ? 'selected' : '' }}>
                                    {{ $nombreFirmante }}
                                </option>
                            @endforeach

                        </select>

                        @error('ID_FIRMANTE')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ID_FACULTAD" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Facultad:</label>
                        <select id="ID_FACULTAD" name="ID_FACULTAD" class="form-control @error('ID_FACULTAD') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione Facultad--</option>
            
                            @foreach ($facultades as $idFacultad => $nombreFacultad)
                                <option value="{{ $idFacultad }}" {{ $resolucion->ID_FACULTAD == $idFacultad ? 'selected' : '' }}>
                                    {{ $nombreFacultad }}
                                </option>
                            @endforeach
            
                        </select>
            
                        @error('ID_FACULTAD')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="ID_DELEGADO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Delegado:</label>
                        <select id="ID_DELEGADO" name="ID_DELEGADO" class="form-control @error('ID_DELEGADO') is-invalid @enderror" required>
                            <option value="" selected>--Seleccione Delegado--</option>
            
                            @foreach ($delegados as $idDelegado => $nombreDelegado)
                                <option value="{{ $idDelegado }}" {{ $resolucion->ID_DELEGADO == $idDelegado ? 'selected' : '' }}>
                                    {{ $nombreDelegado }}
                                </option>
                            @endforeach
            
                        </select>
            
                        @error('ID_DELEGADO')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="DOCUMENTO" class="form-label"><i class="fa-solid fa-book-bookmark"></i> Documento:</label>
                        <div class="input-group">
                            <input type="file" name="DOCUMENTO" id="DOCUMENTO" class="input-group-text btn btn" >
                        </div>
                        <small id="documentoActualHelp" class="form-text text-muted">
                            @if ($resolucion->DOCUMENTO)
                                Archivo adjunto actual: {{ $resolucion->DOCUMENTO }}
                            @else
                                Ningún archivo adjunto seleccionado.
                            @endif
                        </small>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="ELIMINAR_DOCUMENTO" id="ELIMINAR_DOCUMENTO" value="1" {{ $resolucion->DOCUMENTO ? '' : 'disabled' }}>
                            <label class="form-check-label" for="ELIMINAR_DOCUMENTO">
                                Eliminar archivo adjunto actual
                            </label>
                        </div>
                        @error('DOCUMENTO')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group text-right">
                <a href="{{ route('resolucion.index') }}" class="btn btn-secondary">Cancelar</a>
                <button type="submit" class="btn btn-primary">Modificar resolución</button>
              </div>
        </form>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>
    <script>
        $(function () {
            $('#FECHA').flatpickr({
                locale: 'es',
                minDate: "1950-01-01",
                dateFormat: "Y-m-d",
                altFormat: "d-m-Y",
                altInput: true,
                allowInput: true,
            });
        });

        document.getElementById('DOCUMENTO').addEventListener('change', function() {
        var input = this;
        var output = document.getElementById('documentoActualHelp');
        if (input.files && input.files[0]) {
            output.textContent = 'Archivo adjunto actual: ' + input.files[0].name;
        } else {
            output.textContent = 'Ningún archivo adjunto seleccionado.';
        }
    });
    </script>
@endsection