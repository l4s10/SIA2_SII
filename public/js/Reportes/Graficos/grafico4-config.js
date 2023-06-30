document.addEventListener('DOMContentLoaded', (event) => {
    const ctx3 = document.getElementById('myChart3').getContext('2d');
    const myChart3 = new Chart(ctx3, {
        type: 'bar',
        data: window.myChartData3, //CARGAR VARIABLES AQUI SE DEFINE COMO LLAMAR A LOS GRAFICOS.
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Solicitud'
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Cantidad'
                    },
                    ticks: {
                        precision: 0 // Mostrar números enteros en el eje Y
                    }
                }
            },
            plugins: {
                legend: {
                    display: true,
                    labels: {      
                },
                title: {
                    display: true,
                    text: 'Ranking de Patentes',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
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
                myChart3.data.labels = ['Solicitudes'];
                myChart3.data.datasets[0].data = [
                    Math.round(data.grafico4.solicitudMateriales),
                ];
                myChart3.update();
            });
    });
});
