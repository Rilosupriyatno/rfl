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
        }).on('change', function () {
            var cityID = $(this).val();
            $('#district_id').select2('destroy'); // destroy the existing select2 instance
            $('#district_id').select2({
                theme: 'bootstrap4',
                placeholder: 'Pilih Kecamatan',
                allowClear: true,
                // minimumInputLength: 3,
                ajax: {
                    url: '/setting/district/options?city=' + cityID,
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
                var districtID = $(this).val();
                $('#village_id').select2('destroy'); // destroy the existing select2 instance
                $('#village_id').select2({
                    theme: 'bootstrap4',
                    placeholder: 'Pilih Desa',
                    allowClear: true,
                    // minimumInputLength: 3,
                    ajax: {
                        url: '/setting/village/options?district=' + districtID,
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
        });
    });

    $('#city_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kota',
        allowClear: true,
        minimumInputLength: 3
    });

    $('#district_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kecamatan',
        allowClear: true,
        minimumInputLength: 3
    });

    $('#village_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Desa',
        allowClear: true,
        minimumInputLength: 3
    });

    $('#user_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih User ID',
        allowClear: true,
    });
});

$(document).ready(function () {
    $('#user_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih User',
        allowClear: true,
        ajax: {
            url: '/master/users/options',
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
