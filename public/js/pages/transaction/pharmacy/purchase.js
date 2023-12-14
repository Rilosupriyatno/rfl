$(document).ready(function () {
    $('#supplier_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Supplier',
        allowClear: true,
        minimumInputLength: 3,
        ajax: {
            url: '/master/medicine-supplier/options',
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

    $('#payment_method').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Metode Pembayaran',
        allowClear: true
    });
});
