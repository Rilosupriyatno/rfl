$(document).ready(function () {
    $('#province_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Provinsi',
        allowClear: true,
        // minimumInputLength: 3,
        ajax: {
            url: '/setting/province/options',
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
    }).on('change', function () {
        var provinceId = $(this).val();
        $('#city_id').select2('destroy'); // destroy the existing select2 instance
        $('#city_id').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Kota',
            allowClear: true,
            // minimumInputLength: 3,
            ajax: {
                url: '/setting/city/options?province=' + provinceId, // pass the selected province id as a parameter
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

    $('#city_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kota',
        allowClear: true,
        // minimumInputLength: 3
    });
});
