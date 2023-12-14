$('select[name="laboratory_test_category_id"]').select2({
    theme: "bootstrap4",
    placeholder: "Pilih Kategori Pemeriksaan",
    allowClear: true,
    ajax: {
        url: "/master/laboratory-test-category/options",
        dataType: "json",
        delay: 250,
        processResults: function (data) {
            return {
                results: $.map(data, function (item) {
                    return {
                        id: item.id,
                        text: item.description,
                    };
                }),
            };
        },
        cache: true,
    },
});
