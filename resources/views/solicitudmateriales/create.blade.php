@extends('adminlte::page')

<!-- TITULO DE LA PESTAÑA -->
@section('title', 'Solicitar Material')

<!-- CABECERA DE LA PAGINA -->
@section('content_header')
    <h1>Solicitud Material</h1>
@stop

@section('content')
    <!-- COLOCA AQUI EL FORMULARIO QUE CREES -->
    <form>
        <div class="mb-3">
            <label for="ID_SOLICITUD" class="form-label">ID de Solicitud:</label>
            <input type="text" id="ID_SOLICITUD" name="ID_SOLICITUD" class="form-control" tabindex="2">
        </div>

        <div class="mb-3">
            <label for="NOMBRE_SOLICITANTE" class="form-label">Nombre del Solicitante:</label>
            <input type="text" id="NOMBRE_SOLICITANTE" name="NOMBRE_SOLICITANTE" class="form-control">
        </div>
        <div>
            <label for="RUT" class="form-label">RUT:</label>
            <input type="text" id="RUT" name="RUT" class="form-control">
        </div>
        <label for="DEPTO">Departamento:</label>
        <input type="text" id="DEPTO" name="DEPTO"><br><br>

        <label for="EMAIL">Email:</label>
        <input type="email" id="EMAIL" name="EMAIL"><br><br>

        <label for="TIPO_MAT_SOL">Tipo de Material Solicitado:</label>
        <input type="text" id="TIPO_MAT_SOL" name="TIPO_MAT_SOL"><br><br>

        <label for="MATERIAL_SOL">Material Solicitado:</label>
        <input type="textarea" id="MATERIAL_SOL" name="MATERIAL_SOL"><br><br>

        <label for="ESTADO_SOL">Estado de la Solicitud:</label>
        <input type="text" id="ESTADO_SOL" name="ESTADO_SOL"><br><br>

        <input type="submit" value="Enviar">
</form>
    <!-- AQUI SE EDITA EL FORMULARIO -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

