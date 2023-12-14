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
                            stock: item.stock
                        }
                    })
                };
            },
            cache: true
        }
    }).on('change', function () {
        var medicineID = $(this).val();
        $('#medicine_batch_id').select2('destroy'); // destroy the existing select2 instance
        $('#medicine_batch_id').select2({
            theme: 'bootstrap4',
            placeholder: 'Pilih Batch Obat',
            allowClear: true,
            ajax: {
                url: '/master/medicine-batch/options?medicineID=' + medicineID, // pass the selected province id as a parameter
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

    $('#medicine_batch_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Batch',
        allowClear: true,
        // minimumInputLength: 3
    });

    $('#type').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Berkurang atau Bertambah',
        allowClear: true,
        // minimumInputLength: 3
    });

    $('#medicine_id').on('change', function () {
        var stock = $(this).select2('data')[0].stock;
        $('input[name="qty_system"]').val(stock);
    });
});
