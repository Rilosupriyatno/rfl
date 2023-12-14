$(document).ready(function () {
    $('#medicine_units_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Unit',
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
});
