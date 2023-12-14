$(document).ready(function () {
    $("#unit").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Satuan",
        allowClear: true,
    });

    $("#rattan_from").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Kota / Kab",
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: "/setting/city/options_city",
            dataType: "json",
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.name,
                        };
                    }),
                };
            },
            cache: true,
        },
    });
    $("#grade_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Grade",
        allowClear: true,
        ajax: {
            url: "/master/grade/options",
            dataType: "json",
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name,
                        };
                    }),
                };
            },
            cache: true,
        },
    });

});