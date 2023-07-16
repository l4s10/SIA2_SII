// 26 gráfico Solicitudes de reparaciones de vehiculo por ubicacion.
document.addEventListener('DOMContentLoaded', (event) => {
    const ctx25 = document.getElementById('myChart25').getContext('2d');
    const myChart25 = new Chart(ctx25, {
        type: 'pie',
        data: window.myChartData25, //CARGAR VARIABLES
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
                    text: 'Solicitudes de reparacion de inmuebles por ubicacion',
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
                throw new Error("HTTP error " + response.status);
            }
            return response.json();
        })
        .then(data => {
            if(data.message){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: data.message,
                })
            } else {
                myChart25.data.labels = data.grafico25.map(item => item.ubicacion);
                myChart25.data.datasets[0].data = data.grafico25.map(item => item.conteo);
                myChart25.update();
            }
        })
        .catch(error => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Something went wrong!',
            })
        });
    });
});
