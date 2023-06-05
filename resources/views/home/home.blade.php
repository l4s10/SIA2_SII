@extends('adminlte::page')

@section('title', 'Menú principal')

@section('content_header')
    <h1>Calendario de eventos</h1>
@endsection

@section('content')
    <div class="" id="calendar"></div>

    <!-- Modal -->
    <div class="modal fade" id="eventModal" tabindex="-1" aria-labelledby="eventModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="eventModalLabel">Nuevo evento</h5>
                </div>
                <div class="modal-body">
                    <form id="eventForm">
                        <div class="form-group">
                            <label for="title">Título del evento</label>
                            <input type="text" class="form-control" id="title" placeholder="Introduce el título">
                        </div>
                        <div class="form-group">
                            <label for="startDate">Fecha de inicio</label>
                            <input type="text" class="form-control" id="startDate">
                        </div>
                        <div class="form-group">
                            <label for="endDate">Fecha de fin</label>
                            <input type="text" class="form-control" id="endDate">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="saveEvent">Guardar evento</button>
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

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.8/locales/es.global.min.js"></script>
    <script>

    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',  // Aquí se especifica el locale
            dateClick: function() {
                var eventModal = new bootstrap.Modal(document.getElementById('eventModal'));
                eventModal.show();
            }
        });
        calendar.render();

        // Initialize Flatpickr
        $('#startDate, #endDate').flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i",
        });

        // Save event
        $('#saveEvent').click(function() {
            var title = $('#title').val();
            var startDate = $('#startDate').val();
            var endDate = $('#endDate').val();

            // Add event to FullCalendar
            calendar.addEvent({
                title: title,
                start: startDate,
                end: endDate
            });

            // Close modal
            eventModal.hide();

            // Reset form
            $('#eventForm')[0].reset();
        });
    });

    </script>
@endsection

