// document.addEventListener('DOMContentLoaded', (event) => {
//     const ctx = document.getElementById('myChart1').getContext('2d');
//     const myChart = new Chart(ctx, {
//         type: 'bar',
//         data: window.myChartData, //CARGAR VARIABLES
//         options: {
//             scales: {
//                 x: {
//                     title: {
//                         display: true,
//                         text: 'Solicitud'
//                     }
//                 },
//                 y: {
//                     beginAtZero: true,
//                     title: {
//                         display: true,
//                         text: 'Cantidad'
//                     },
//                     ticks: {
//                         precision: 0 // Mostrar números enteros en el eje Y
//                     }
//                 }
//             },
//             plugins: {
//                 legend: {
//                     display: true,
//                     labels: {
//                         generateLabels: function (chart) {
//                             const data = chart.data;
//                             if (data.labels.length && data.datasets.length) {
//                                 return data.labels.map(function (label, index) {
//                                     const dataset = data.datasets[0];
//                                     const backgroundColor = dataset.backgroundColor[index];
//                                     return {
//                                         text: label,
//                                         fillStyle: backgroundColor,
//                                         hidden: false,
//                                         lineCap: 'round',
//                                         lineDash: [],
//                                         lineDashOffset: 0,
//                                         lineJoin: 'round',
//                                         lineWidth: 1,
//                                         strokeStyle: backgroundColor,
//                                         pointStyle: 'circle',
//                                         rotation: 0
//                                     };
//                                 });
//                             }
//                             return [];
//                         }
//                     }
//                 },
//                 title: {
//                     display: true,
//                     text: 'Tipos de materiales solicitados',
//                     padding: {
//                         top: 10,
//                         bottom: 30
//                     }
//                 }
//             }
//         }
//     });

//     document.querySelector('#refresh-button').addEventListener('click', function () {
//         var fechaInicio = document.querySelector('#start-date').value;
//         var fechaFin = document.querySelector('#end-date').value;

//         Swal.fire({
//             title: 'Actualizando registros',
//             timer: 2000,
//             didOpen: () => {
//                 Swal.showLoading();
//             },
//             willClose: () => {
               // Al cerrarse
//             }
//         });

//         fetch('/reportes/data', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json',
//                 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
//             },
//             body: JSON.stringify({
//                 fechaInicio: fechaInicio,
//                 fechaFin: fechaFin
//             })
//         })
//             .then(response => response.json())
//             .then(data => {
//                 myChart.data.datasets[0].data = [
//                     Math.round(data.grafico1.solicitudSala),
//                     Math.round(data.grafico1.solicitudBodegas),
//                     Math.round(data.grafico1.solicitudReparacionVehiculo),
//                     Math.round(data.grafico1.relFunVeh)
//                 ];
//                 myChart.update();
//             });
//     });
// });
