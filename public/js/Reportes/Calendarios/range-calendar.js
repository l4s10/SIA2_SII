$(function () {
    $('#start-date').flatpickr({
        locale: 'es',
        dateFormat: "Y-m-d",
        altFormat: 'd-m-Y',
        altInput: true,
    });
    $('#end-date').flatpickr({
        locale: 'es',
        dateFormat: "Y-m-d",
        altFormat: 'd-m-Y',
        altInput: true,
    });
});
