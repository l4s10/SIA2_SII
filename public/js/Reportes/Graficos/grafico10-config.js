document.addEventListener('DOMContentLoaded', (event) => {
    const ctx10 = document.getElementById('myChart10').getContext('2d');
    const myChart10 = new Chart(ctx10, {
        type: 'pie',
        data: window.myChartData10,
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
                    text: 'Gestionadores de solicitudes de reserva de vehiculo',
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
                myChart10.data.labels = data.grafico10.map(item => item.nombre);
                myChart10.data.datasets[0].data = data.grafico10.map(item => item.conteo);
                myChart10.update();
            });
    });
});
