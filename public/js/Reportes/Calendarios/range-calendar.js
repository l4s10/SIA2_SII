$(function () {
    var startDatePicker = $('#start-date').flatpickr({
        locale: 'es',
        dateFormat: "Y-m-d",
        altFormat: 'd-m-Y',
        altInput: true,
        minDate: "2019-01", // establece la fecha mínima a enero de 2019 suponiendo los datos recuperados del SIA V1
        onChange: function(selectedDates, dateStr, instance) {
            endDatePicker.set('minDate', selectedDates[0] || null);
        }
    });

    var endDatePicker = $('#end-date').flatpickr({
        locale: 'es',
        dateFormat: "Y-m-d",
        altFormat: 'd-m-Y',
        altInput: true,
    });
});
