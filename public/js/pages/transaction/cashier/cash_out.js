$(document).ready(function () {
    
    $('#cashier_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Petugas Kasir',
        allowClear: true,
        ajax: {
            url: '/master/cashier/options',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.id,
                            text: item.name,
                        }
                    })
                };
            },
            cache: true
        }
    });

    $('#cashout_in_charge').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Penanggung Jawab',
        allowClear: true,
        ajax: {
            url: '/master/cashier/options_name',
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: $.map(data, function (item) {
                        return {
                            id: item.name,
                            text: item.name,
                        }
                    })
                };
            },
            cache: true
        }
    });
    $('#method').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Metode Pembayaran',
        allowClear: true
    });
});
