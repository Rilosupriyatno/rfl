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

        this._initeDescriptionEditor();
    }

    _initeDescriptionEditor() {
        if (document.getElementById('description')) {
            const descriptionQuil = new Quill('#description', {
                modules: {
                    toolbar: this.quillToolbarOptions,
                },
                name: 'description',
                theme: 'snow',
            });

            const initial = document.querySelector('#description-value');
            descriptionQuil.root.innerHTML = initial.value;

            const descriptionValueInput = document.getElementById('description-value');

            descriptionQuil.on('text-change', function () {
                const html = descriptionQuil.root.innerHTML;
                descriptionValueInput.value = html;
            });
        }
    }
}

const editorControls = new EditorControls();
