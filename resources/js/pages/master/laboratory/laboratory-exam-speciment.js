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

class EditorControls {
    constructor() {
        // Initialization of the page plugins
        if (typeof Quill === 'undefined') {
            console.log('Quill is undefined!');
            return;
        }

        this.quillToolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            ['blockquote', 'code-block'],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ indent: '-1' }, { indent: '+1' }],
            [{ size: ['small', false, 'large', 'huge'] }],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            [{ font: [] }],
            [{ align: [] }],
            ['clean'],
        ];

        this.quillBubbleToolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],
            [{ header: [1, 2, 3, 4, 5, 6, false] }],
            [{ list: 'ordered' }, { list: 'bullet' }],
            [{ align: [] }],
        ];

        this._initNilaiReferensiEditor();
    }

    _initNilaiReferensiEditor() {
        if (document.getElementById('reference_value')) {
            const referenceValueQuil = new Quill('#reference_value', {
                modules: {
                    toolbar: this.quillToolbarOptions,
                },
                name: 'reference_value',
                theme: 'snow',
            });

            const initial = document.querySelector('#referenceValue');
            referenceValueQuil.root.innerHTML = initial.value;

            const referenceValueInput = document.getElementById('referenceValue');

            referenceValueQuil.on('text-change', function () {
                const html = referenceValueQuil.root.innerHTML;
                referenceValueInput.value = html;
            });
        }
    }
}

const editorControls = new EditorControls();
