document.addEventListener('DOMContentLoaded', (event) => {
    const ctx2 = document.getElementById('myChart2').getContext('2d');
    const myChart2 = new Chart(ctx2, {
        type: 'pie',
        data: window.myChartData2,
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'right'
                },
                title: {
                    display: true,
                    text: 'Cantidad de funcionarios',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                // tooltips: {
                //     callbacks: {
                //         label: function (tooltipItem, data) {
                //             const dataset = data.datasets[tooltipItem.datasetIndex];
                //             const total = dataset.data.reduce((accumulator, currentValue) => accumulator + currentValue, 0);
                //             const currentValue = dataset.data[tooltipItem.index];
                //             const percentage = ((currentValue / total) * 100).toFixed(2) + '%';
                //             return `${currentValue} (${percentage})`;
                //         }
                //     }
                // },
                labels: {
                    render: 'label',
                    precision: 0,
                    fontColor: 'black',
                    fontStyle: 'bold'
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
                // Obtener los valores de sexo del objeto data
                const totalHombres = data.grafico3.totalHombres;
                const totalMujeres = data.grafico3.totalMujeres;

                // Actualizar los datos del gráfico
                myChart2.data.labels = ['Hombres', 'Mujeres'];
                myChart2.data.datasets[0].data = [totalHombres, totalMujeres];
                myChart2.update();
            });
    });
});
