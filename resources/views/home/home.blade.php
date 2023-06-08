@extends('adminlte::page')

@section('title', 'Menú principal')

@section('content_header')
    <h1>Calendario de eventos</h1>
@endsection

@section('content')
    <div class="" id="calendar"></div>
    <!-- Carta para mostrar los detalles del evento -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Detalles </h5>
                </div>
                <div class="modal-body">
                    {{-- *DETALLE DEL EVENTO* --}}
                    <p><i class="fa-solid fa-building-flag"></i> <strong>Lugar/evento:</strong> <span id="eventTitle"></span></p>
                    <p><i class="fa-regular fa-calendar-check"></i> <strong>Tipo de evento:</strong> <span id="eventType"></span></p>
                    {{-- *DATOS SOLICITANTE* --}}
                    <p><i class="fa-solid fa-building-user"></i> <strong>Departamento:</strong> <span id="eventDepartamento"></span></p>
                    <p><i class="fa-solid fa-user"></i> <strong>Nombre Solicitante:</strong> <span id="eventNombreSolicitante"></span></p>
                    {{-- *FECHAS* --}}
                    <p><i class="fa-solid fa-hourglass-start"></i> <strong>Fecha de inicio:</strong> <span id="startDate"></span></p>
                    <p><i class="fa-solid fa-hourglass-end"></i> <strong>Fecha de termino:</strong> <span id="endDate"></span></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('js')
    <!-- Incluir archivos JS flatpicker-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/es.js"></script>

    <!-- CONEXION FONT-AWESOME CON TOOLKIT -->
    <script src="https://kit.fontawesome.com/742a59c628.js" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/locales/es.global.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                locale: 'es',
                events: @json($events),
                displayEventEnd: true,
                dayHeaderFormat: { weekday: 'long' },
                eventClick: function(info) {
                    // Mostrar los detalles del evento en la carta modal
                    $('#eventTitle').text(info.event.title);
                    $('#startDate').text(moment(info.event.start).format('DD-MM-YYYY H:mm'));
                    $('#endDate').text(moment(info.event.end).format('DD-MM-YYYY H:mm'));
                    // Mostrar otros detalles del evento aquí
                    $('#eventDepartamento').text(info.event.extendedProps.departamento);
                    $('#eventNombreSolicitante').text(info.event.extendedProps.nombreSolicitante);
                    $('#eventType').text(info.event.extendedProps.tipoEvento);

                    // Abrir la carta modal
                    var modal = new bootstrap.Modal(document.getElementById('eventModal'));
                    modal.show();
                }
            });
            calendar.render();
        });
    </script>
@endsection

