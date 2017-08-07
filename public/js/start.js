$(document).ready(function() {
    /*init CKeditor*/
    $(function () {
        $('.richeditors').each(function(e){
            CKEDITOR.replace(this.id, {
                toolbarGroups: [
                    { name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
                    { name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
                    { name: 'links' },
                    { name: 'insert' },
                    { name: 'forms' },
                    { name: 'tools' },
                    { name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
                    { name: 'others' },
                    '/',
                    { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
                    { name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
                    { name: 'styles' },
                    { name: 'colors' },
                    { name: 'about' }
                ]
            });
        });
    });

    /*init datetimepicker*/
    $('[data-datetimepicker]').datetimepicker(
        {
            lang: 'en',
            format: 'Y-m-d H:i:s',
            scrollInput: false
        }
    );
});