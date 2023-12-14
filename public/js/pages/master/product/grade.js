$(document).ready(function () {
    $("#unit").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Satuan",
        allowClear: true,
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