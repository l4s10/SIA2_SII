// 14 gráfico Gestionadores de solicitudes de reserva de salas.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx13 = document.getElementById('myChart13').getContext('2d');
    const myChart13 = new Chart(ctx13, {
        type: 'pie',
        data: window.myChartData13,
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Gestionadores'
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
                    text: 'Gestionadores de solicitudes de reserva de salas',
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
                myChart13.data.labels = data.grafico13.map(item => item.nombre);
                myChart13.data.datasets[0].data = data.grafico13.map(item => item.conteo);
                myChart13.update();
            });
    });
});
