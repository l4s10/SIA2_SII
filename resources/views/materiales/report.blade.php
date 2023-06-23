<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Materiales</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        .container {
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Reporte de Materiales</h1>
        <p style="text-align: center">Fecha y hora de generación del reporte: {{ $fecha }}</p>
        <table>
            <thead>
                <tr>
                    <th>Tipo material</th>
                    <th>Nombre</th>
                    <th>Stock</th>
                </tr>
            </thead>
            <tbody>
                @foreach($materiales as $material)
                    <tr>

                        <td>{{ $material->tipoMaterial->TIPO_MATERIAL }}</td>
                        <td>{{ $material->NOMBRE_MATERIAL }}</td>
                        <td>{{ $material->STOCK}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
