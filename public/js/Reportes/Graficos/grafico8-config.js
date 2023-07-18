document.addEventListener('DOMContentLoaded', (event) => {
    const ctx8 = document.getElementById('myChart8').getContext('2d');
    const myChart8 = new Chart(ctx8, {
        type: 'bar',
        data: window.myChartData8,
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
                    text: 'Estado de solicitudes de reserva de vehiculo',
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
                myChart8.data.labels = data.grafico8.map(item => item.estado);
                myChart8.data.datasets[0].data = data.grafico8.map(item => item.conteo);
                myChart8.update();
            });
    });
});
