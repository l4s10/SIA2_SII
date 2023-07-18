document.addEventListener('DOMContentLoaded', (event) => {
    const ctx22 = document.getElementById('myChart22').getContext('2d');
    const myChart22 = new Chart(ctx22, {
        type: 'bar',
        data: window.myChartData22,
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
                    text: 'inmuebles con mas reparaciones',
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
                // Actualizar los datos del gráfico
                myChart22.data.labels = data.map(item => item.tipo); // Obtener todos los tipos
                myChart22.data.datasets[0].data = data.map(item => item.conteo); // Obtener todos los conteos
                myChart22.update();
            });
    });
});
