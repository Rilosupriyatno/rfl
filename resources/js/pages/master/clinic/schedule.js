$(document).ready(function () {
    $('#doctor_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Dokter',
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: '/master/doctor/options',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#service_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Data',
        allowClear: true,
        ajax: {
            url: '/master/service/options',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.description
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#day').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Hari',
        allowClear: true,
    });
});
