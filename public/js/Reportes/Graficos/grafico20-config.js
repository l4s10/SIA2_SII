// 21 gráfico Estado de solicitudes de reparaciones de vehiculo.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx20 = document.getElementById('myChart20').getContext('2d');
    const myChart20 = new Chart(ctx20, {
        type: 'bar',
        data: window.myChartData20, //CARGAR VARIABLES
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Solicitudes'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
                    },
                    ticks: {
                        precision: 0
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {
                        generateLabels: function (chart) {
                            const data = chart.data;
                            if (data.labels.length && data.datasets.length) {
                                return data.labels.map(function (label, index) {
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
                    text: 'Estado de solicitudes de reparaciones de vehiculo.',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                }
            }
        }
    });

    document.querySelector('#refresh-button').addEventListener('click', function () {
        var fechaInicio = document.querySelector('#start-date').value;
        var fechaFin = document.querySelector('#end-date').value;

        Swal.fire({
            title: 'Actualizando registros',
            timer: 2000,
            didOpen: () => {
                Swal.showLoading();
            },
            willClose: () => {
               // Al cerrarse
            }
        });

        fetch('/reportes/data', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                fechaInicio: fechaInicio,
                fechaFin: fechaFin
            })
        })
            .then(response => response.json())
            .then(data => {
                myChart20.data.labels = data.grafico20.map(item => item.estado);
                myChart20.data.datasets[0].data = data.grafico20.map(item => item.conteo);
                myChart20.update();
            });
    });
});
