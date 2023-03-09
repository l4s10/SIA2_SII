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
        <label for="id_solicitud">ID de Solicitud:</label>
        <input type="text" id="id_solicitud" name="id_solicitud"><br><br>

        <label for="nombre_solicitante">Nombre del Solicitante:</label>
        <input type="text" id="nombre_solicitante" name="nombre_solicitante"><br><br>

        <label for="rut">RUT:</label>
        <input type="text" id="rut" name="rut"><br><br>

        <label for="depto">Departamento:</label>
        <input type="text" id="depto" name="depto"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br><br>

        <label for="tipo_mat_sol">Tipo de Material Solicitado:</label>
        <input type="text" id="tipo_mat_sol" name="tipo_mat_sol"><br><br>

        <label for="material_sol">Material Solicitado:</label>
        <input type="text" id="material_sol" name="material_sol"><br><br>

        <label for="estado_sol">Estado de la Solicitud:</label>
        <input type="text" id="estado_sol" name="estado_sol"><br><br>

        <input type="submit" value="Enviar">
</form>
    <!-- AQUI SE EDITA EL FORMULARIO -->
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop

