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
            border: 1px solid #0064a0;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #0064a0;
        }
        thead {
        color: #fff;
        }
        .background {
        background-position: center;
        background-image: url('data:image/jpg;base64,{!! base64_encode(file_get_contents($imagePath2)) !!}') ;
        background-repeat: no-repeat;
        }
    </style>
</head>
<body class="background">
    <div class="container">
    {{--En esta línea de código muestra una imagen en un documento HTML. 
        La imagen se codifica en base64 y se almacena en una variable llamada $imagePath. 
        La línea de código utiliza la función base64_encode() para codificar la imagen en base64. 
        Luego, utiliza la función file_get_contents() para leer el contenido de la imagen codificada. 
        Finalmente, utiliza la etiqueta img para mostrar la imagen en el documento HTML.--}}
        <img src="data:image/jpg;base64, {!! base64_encode(file_get_contents($imagePath)) !!}" alt="Logotipo Sii" width="200px" height="100px">
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