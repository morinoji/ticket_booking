
$(function () {
    $(".tags_select").select2({
        tags: true,
        tokenSeparators: [',',';']
    })

    let editor_config = {
        path_absolute: "/",
        selector: "textarea.my-editor",
        plugins: 'a11ychecker advcode casechange formatpainter linkchecker autolink lists checklist media mediaembed pageembed permanentpen powerpaste table advtable tinycomments tinymcespellchecker image searchreplace wordcount textcolor colorpicker',

        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
        toolbar_mode: 'floating',
        relative_urls: false,
        tinycomments_mode: 'embedded',
        tinycomments_author: 'Authorname',
        image_caption: true,
        file_picker_types: 'file image media',
        file_picker_callback: function (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight || document.documentElement.clientHeight || document.getElementsByTagName('body')[0].clientHeight;

            let type = 'image' === meta.filetype ? 'Images' : 'Files',
                url = '/filemanager?editor=tinymce5&type=' + type;

            tinymce.activeEditor.windowManager.openUrl({
                url: url,
                title: 'Filemanager',
                width: x * 0.8,
                height: y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    };
    tinymce.init(editor_config);

})

$('.checked_wrapper').on('click',function () {
    $(this).parents('.card').find('.checked_child').prop('checked',$(this).prop('checked'));
})

$('.checkall').on('click',function () {
    $(this).parents().find('.checked_child').prop('checked',$(this).prop('checked'));
})

