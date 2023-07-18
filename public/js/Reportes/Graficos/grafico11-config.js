// 12 gráfico salas mas asignadas.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx11 = document.getElementById('myChart11').getContext('2d');
    const myChart11 = new Chart(ctx11, {
        type: 'bar',
        data: window.myChartData11, //CARGAR VARIABLES AQUI SE DEFINE COMO LLAMAR A LOS GRAFICOS.
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Salas'
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
                    text: 'Salas mas asignadas',
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
            // Obtiene los datos de la respuesta
            let graficoData = data.grafico11;

            // Actualiza las etiquetas y los datos del gráfico
            myChart11.data.labels = graficoData.map(item => item.sala);
            myChart11.data.datasets[0].data = graficoData.map(item => item.conteo);
            myChart11.update();
        });
    });
});
