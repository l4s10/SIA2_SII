@extends('adminlte::page')

@section('title', 'Reportes')

@section('content_header')
    <h1>Reportes</h1>
    @role('ADMINISTRADOR')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Administrador:</strong> Acceso total al modulo.<div>
    </div>
    @endrole
    @role('SERVICIOS')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Servicio:</strong> Aqui iria el texto donde le corresponde el rol SERVICIO.<div>
    </div>
    @endrole
    @role('INFORMATICA')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Informatica:</strong> Aqui iria el texto donde le corresponde el rol INFORMATICA.<div>
    </div>
    @endrole
    @role('JURIDICO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Juridico:</strong> Aqui iria el texto donde le corresponde el rol JURIDICO.<div>
    </div>
    @endrole
    @role('FUNCIONARIO')
    <div class="alert alert-info" role="alert">
    <div><strong>Bienvenido Funcionario:</strong> Aqui iria el texto donde le corresponde el rol FUNCIONARIO.<div>
    </div>
    @endrole
@endsection

@section('content')
<!-- Agrega los elementos input de fecha aquí -->
<div class="container overflow-hidden">
    <div class="row gx-5 custom-row">
        <div class="col-md-3">
            <label for="start-date">Fecha de inicio:</label>
            <input type="date" id="start-date" class="form-control">
        </div>
        <div class="col-md-3">
            <label for="end-date">Fecha de fin:</label>
            <input type="date" id="end-date" class="form-control">
        </div>
        <div class="col-md-3 custom-button">
            <button id="refresh-button" class="btn btn-primary btn-refresh">Refrescar fechas</button>
        </div>
    </div>
</div>
<!-- Asignacion de los calendarios. -->
<div class="row ">
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart1"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart2"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart3"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart4"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart5"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart6"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart7"></canvas>
            </div>
        </div>
    <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart8"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart9"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart10"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart11"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart12"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart13"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart14"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart15"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart16"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart17"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart18"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart19"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart20"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart21"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart22"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart23"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart24"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart25"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart26"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart27"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart28"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart29"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart30"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart31"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart32"></canvas>
            </div>
        </div>
        <div class="col-md-6">
            <div class="chart-container">
            <canvas id="myChart33"></canvas>
            </div>
        </div>
</div>
@endsection

@section('css')
    <style>
        .alert {
        opacity: 0.7; /* Ajusta la opacidad a tu gusto */
        background-color: #99CCFF;
        color:     #000000;
        }
    </style>
    <style>
        .chart-container {
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
        margin-bottom: 20px;
    }
    .custom-button {
        margin-top: 30px;
    }
    .custom-row {
        margin-top: 0;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    </style>
@stop

@section('js')
<!-- CONEXION FONT-AWESOME CON TOOLKIT -->
<script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Primer grafico
    id: 'myChart',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Segundo
    id: 'myChart1',
    labels: ['Aseo', 'Computacion', 'Electrodomesticos', 'Escritorio', 'Ferreteria'],
    data: [10, 19, 3, 5, 2],
    backgroundColor: [
        'rgba(0, 0, 255, 0.2)',    // Color de fondo para Aseo (azul)
        'rgba(255, 165, 0, 0.2)',  // Color de fondo para Computacion (naranja)
        'rgba(255, 0, 0, 0.2)',    // Color de fondo para Electrodomesticos (rojo)
        'rgba(255, 255, 0, 0.2)',  // Color de fondo para Escritorio (amarillo)
        'rgba(0, 128, 0, 0.2)'     // Color de fondo para Ferreteria (verde)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Tipos de materiales solicitados',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Tercero Grafico
    id: 'myChart2',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Estados de solicitudes de materiales',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        
        
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //cuarto grafico
    id: 'myChart3',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Estados de solicitudes de formularios',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Quinto grafico
    id: 'myChart4',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'bar',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Septimo grafico
    id: 'myChart6',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart7',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {
const chartData = [
    {
    //Sexto grafico
    id: 'myChart5',
    labels: ['Salas', 'Bodegas', 'Reparación de Vehículos', 'Reserva de Vehículos'],
    data: [12, 19, 3, 5],
    backgroundColor: [
        'rgba(255, 165, 0, 0.2)', // Color de fondo para Salas (naranja)
        'rgba(255, 0, 0, 0.2)', // Color de fondo para Bodegas (rojo)
        'rgba(0, 128, 0, 0.2)', // Color de fondo para Reserva de Vehículos (verde)
        'rgba(0, 191, 255, 0.2)' // Color de fondo para Reparación de Vehículos (celeste)
    ]
    }
];

const options = {
    scales: {
    x: {
        title: {
        display: true,
        text: 'Solicitud',
        }
    },
    y: {
        beginAtZero: true,
        title: {
        display: true,
        text: 'Cantidad',
        }
    }
    },
    plugins: {
    legend: {
        display: true,
        labels: {
        generateLabels: function(chart) {
            const data = chart.data;
            if (data.labels.length && data.datasets.length) {
            return data.labels.map(function(label, index) {
                const dataset = data.datasets[0];
                const backgroundColor = dataset.backgroundColor[index];
                return {
                text: label,
                fillStyle: backgroundColor,
                hidden: false,
                lineCap: 'round',
                lineDash: [],
                lineDashOffset: 0,
                lineJoin: 'round',
                lineWidth: 1,
                strokeStyle: backgroundColor,
                pointStyle: 'circle',
                rotation: 0
                };
            });
            }
            return [];
        }
        }
    },
    title: {
        display: true,
        text: 'Ranking de Solicitudes',
        padding: {
        top: 10,
        bottom: 30
        }
    }
    }
};

    chartData.forEach(function(chart) {
        const ctx = document.getElementById(chart.id);
        const data = {
        labels: chart.labels,
        datasets: [{
            data: chart.data,
            backgroundColor: chart.backgroundColor,
            borderWidth: 1
        }]
        };

        new Chart(ctx, {
        type: 'doughnut',
        data: data,
        options: options
        });
    });
});
</script>

@endsection
