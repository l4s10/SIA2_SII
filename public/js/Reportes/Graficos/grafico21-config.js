// 22 gráfico Solicitudes de reparaciones de vehiculo por ubicacion.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx21 = document.getElementById('myChart21').getContext('2d');
    const myChart21 = new Chart(ctx21, {
        type: 'pie',
        data: window.myChartData21, //CARGAR VARIABLES
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Ubicaciones'
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
                    text: 'Solicitudes de reparaciones de vehiculo por ubicacion',
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
        .then(response => {
            if (!response.ok) {
                throw new Error('Error en la consulta');
            }
            return response.json();
        })
        .then(data => {
            // Actualizar los datos del gráfico
            myChart21.data.labels = data.grafico21.map(item => item.ubicacion);
            myChart21.data.datasets[0].data = data.grafico21.map(item => item.conteo);
            myChart21.update();
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salió mal en el gráfico 21!',
            })
        });
    });
});
