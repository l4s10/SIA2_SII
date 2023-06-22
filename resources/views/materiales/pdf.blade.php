<!DOCTYPE html>
<html>
<head>
    <title>Lista de Materiales</title>
</head>
<body>
    <h1>Lista de Materiales</h1>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Stock</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($materiales as $material)
            <tr>
                <td>{{ $material->NOMBRE_MATERIAL }}</td>
                <td>{{ $material->tipoMaterial->TIPO_MATERIAL }}</td>
                <td>{{ $material->STOCK }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
