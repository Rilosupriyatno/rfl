$(document).ready(function () {
    $('#medicine_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Obat',
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: '/master/medicine-data/options',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name,
                            price: item.sell_price,
                            tax: item.tax
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#medicine_id').on('change', function () {
        var price = $(this).select2('data')[0].price;
        var tax = $(this).select2('data')[0].tax;
        $('input[name="price"]').val(price);
        $('input[name="tax"]').val(tax);
    });
});
