// 13 gráfico Solicitudes de reserva de sala requeridos por departmaneto/unidad.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx12 = document.getElementById('myChart12').getContext('2d');
    const myChart12 = new Chart(ctx12, {
        type: 'pie',
        data: window.myChartData12,
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
                        // Aquí puedes configurar las etiquetas de la leyenda
                    }
                },
                title: {
                    display: true,
                    text: 'Solicitudes de reserva de salas requeridos por departmaneto/unidad',
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
                myChart12.data.datasets[0].data = [
                    Math.round(data.stockTipoMaterial),
                    Math.round(data.stockMaterial)
                ];
                myChart12.update();
            });
    });
});
