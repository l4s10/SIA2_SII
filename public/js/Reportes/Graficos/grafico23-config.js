// 24 gráfico Gestionadores de solicitudes de reparacion de vehiculos.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx23 = document.getElementById('myChart23').getContext('2d');
    const myChart23 = new Chart(ctx23, {
        type: 'pie',
        data: window.myChartData23, //CARGAR VARIABLES
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
                    text: 'Gestionadores de solicitudes de reparacion de inmuebles',
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
            myChart23.data.labels = data.grafico23.map(item => item.nombre);
            myChart23.data.datasets[0].data = data.grafico23.map(item => item.conteo);
            myChart23.update();
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Algo salió mal en el gráfico 23!',
            })
        });
    });
});
