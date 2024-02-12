

tinymce.init({
    selector: 'textarea',
    width: '100%',
    height: 400,
    setup: function(editor){
        editor.on('init change', function(){
            editor.save();
        });
    },

    plugins: [
        'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
        'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
        'table', 'emoticons', 'template', 'help'
    ],
    toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
        'bullist numlist outdent indent | link | image | code | print preview media fullscreen | ' +
        'forecolor backcolor emoticons | help',
    a11y_advanced_options: true,
    menu: {
        favs: {
            title: 'My Favorites',
            items: 'code visualaid | searchreplace | emoticons'
        }
    },
    image_advtab: true,
    // image_uploadtab: true,
    menubar: 'favs file edit view insert format tools table help',
    /* without images_upload_url set, Upload tab won't show up*/
    image_title: true,
    automatic_uploads: true,
    images_upload_url: '/admin/upload',

    file_picker_types: 'image',
    /* and here's our custom image picker*/
    file_picker_callback: (cb, value, meta) => {
        const input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');

        input.addEventListener('change', (e) => {
            const file = e.target.files[0];

            const reader = new FileReader();
            reader.addEventListener('load', () => {

                const id = 'blobid' + (new Date()).getTime();
                const blobCache = tinymce.activeEditor.editorUpload.blobCache;
                const base64 = reader.result.split(',')[1];
                const blobInfo = blobCache.create(id, file, base64);
                blobCache.add(blobInfo);

                /* call the callback and populate the Title field with the file name */
                cb(blobInfo.blobUri(), {
                    title: file.name
                });
            });
            reader.readAsDataURL(file);
        });

        input.click();
    },
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
