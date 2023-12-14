$(document).ready(function () {
    $("#province_id")
        .select2({
            theme: "bootstrap4",
            placeholder: "Pilih Provinsi",
            allowClear: true,
            // minimumInputLength: 3,
            ajax: {
                url: "/setting/province/options",
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
        })
        .on("change", function () {
            var provinceId = $(this).val();
            $("#city_id").select2("destroy"); // destroy the existing select2 instance
            $("#city_id")
                .select2({
                    theme: "bootstrap4",
                    placeholder: "Pilih Kota",
                    allowClear: true,
                    // minimumInputLength: 3,
                    ajax: {
                        url: "/setting/city/options?province=" + provinceId, // pass the selected province id as a parameter
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
                })
                .on("change", function () {
                    var cityID = $(this).val();
                    $("#district_id").select2("destroy"); // destroy the existing select2 instance
                    $("#district_id")
                        .select2({
                            theme: "bootstrap4",
                            placeholder: "Pilih Kecamatan",
                            allowClear: true,
                            // minimumInputLength: 3,
                            ajax: {
                                url: "/setting/district/options?city=" + cityID,
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
                        })
                        .on("change", function () {
                            var districtID = $(this).val();
                            $("#village_id").select2("destroy"); // destroy the existing select2 instance
                            $("#village_id").select2({
                                theme: "bootstrap4",
                                placeholder: "Pilih Desa",
                                allowClear: true,
                                // minimumInputLength: 3,
                                ajax: {
                                    url:
                                        "/setting/village/options?district=" +
                                        districtID,
                                    dataType: "json",
                                    delay: 250,
                                    processResults: function (data) {
                                        return {
                                            results: $.map(
                                                data,
                                                function (item) {
                                                    return {
                                                        id: item.id,
                                                        text: item.name,
                                                    };
                                                }
                                            ),
                                        };
                                    },
                                    cache: true,
                                },
                            });
                        });
                });
        });

    $("#city_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Kota",
        allowClear: true,
        // minimumInputLength: 3,
    });

    $("#district_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Kecamatan",
        allowClear: true,
        // minimumInputLength: 3,
    });

    $("#village_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Desa",
        allowClear: true,
        // minimumInputLength: 3,
    });

    $("#gender").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Jenis Kelamin",
        allowClear: true,
    });

    $("#marital_status").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Status Pernikahan",
        allowClear: true,
    });

    $("#family_relationship_status_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Status Hubungan Dalam Keluarga",
        allowClear: true,
        ajax: {
            url: "/master/family-relationship-status/options",
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

    $("#blood_type_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Golongan Darah",
        allowClear: true,
        ajax: {
            url: "/setting/blood-type/options",
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

    $("#patient_type_id").select2({
        theme: "bootstrap4",
        placeholder: "Pilih Jenis Pasien",
        allowClear: true,
        ajax: {
            url: "/master/patient-type/options",
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

    // JS untuk autofill NIK
    $(document).ready(function () {
        $("#dummy_nik").click(function () {
            if ($('#dummy-nik-data').is(':checked')) {
                var randomNum = Math.floor(Math.random() * 16) + 1;
                $('#social_number').val(randomNum);
            } else {
                $('#social_number').val('');
            }
        });
    });

    // JS untuk autofill No KK
    $(document).ready(function () {
        $("#dummy_kk").click(function () {
            if ($('#dummy_kk_data').is(':checked')) {
                var randomNum = Math.floor(Math.random() * 16) + 1;
                $('#social_family_number').val(randomNum);
            } else {
                $('#social_family_number').val('');
            }
        });
    });

    // Auto appear age.
    const dateOfBirthInput = $("input[name='date_of_birth']");
    const ageOutput = $("input[name='age']");

    dateOfBirthInput.on("change", (event) => {
        const dob = new Date(event.target.value); // Get the user's date of birth from the input value
        const now = new Date(); // Get the current date
        const age = now.getFullYear() - dob.getFullYear(); // Calculate the age
        ageOutput.val(age); // Display the guessed age
    });
});
