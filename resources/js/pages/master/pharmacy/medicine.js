$(document).ready(function () {
    $('#medicine_class_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Jenis Obat',
        allowClear: true,
        ajax: {
            url: '/master/medicine-class/options',
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

    $('#medicine_unit_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Unit Obat',
        allowClear: true,
        ajax: {
            url: '/master/medicine-unit/options',
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

    $('#medicine_status_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Status Obat',
        allowClear: true,
        ajax: {
            url: '/master/medicine-status/options',
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
});
