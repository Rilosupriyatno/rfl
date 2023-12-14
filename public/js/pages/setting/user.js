$(document).ready(function () {
    $('#user_role_id').select2({
        theme: 'bootstrap4',
        placeholder: 'Pilih Level',
        allowClear: true,
        // minimumInputLength: 3,
        ajax: {
            url: '/setting/role/options',
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
