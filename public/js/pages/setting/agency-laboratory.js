$(document).ready(function () {
    $('#province_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Provinsi',
        allowClear: true,
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
        allowClear: true
    });

    $('#district_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Kecamatan',
        allowClear: true
    });

    $('#village_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Desa',
        allowClear: true
    });

    $(document).on('click', '#btn-access', function () {
        const url = "/landing/laboratory/access-laboratory?roles=5&role_name=admin-lab";
        window.location.href = url;
    });
});
