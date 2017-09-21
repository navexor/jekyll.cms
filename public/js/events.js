(function ($) {

    //list of handlers
    var handlers = {};

    //rebuild jekyll site
    handlers.generateBlog = function(elem) {
        console.log('generateBlog');

        var popupContainer = $('#popup-generator');
        popupContainer.find('.modal-body').html('<div class="loading-small"></div>');
        popupContainer.modal();

        var afterExec = function(result) {
            popupContainer.find('.modal-body').html(result);
        };
        callAjax(elem.prop('href'), {}, afterExec);
    };

    handlers.addToEditor = function(elem) {
        console.log('addToEditor');
        var ckEditor = CKEDITOR.instances['content'];
        ckEditor.focus();
        ckEditor.insertHtml('Hello world');
    };

    handlers.uploadFiles = function(elem) {
        $("#fileupload").click();
        elem.preventDefault();
        return false;
    };


    //click events
    $(document).on('click', '[data-click]', function(e){
        e.stopImmediatePropagation();
        e.preventDefault();

        var self = $(this);
        var handlerName = self.data('click');

        if (handlerName && handlers[handlerName]) {
            handlers[handlerName](self);
        }

        return false;
    });

})(jQuery);


(function ($) {

    $('#fileupload').on('change', function (e) {

        $("#uploadForm").submit();
        e.preventDefault();

    });

    $('#uploadForm').on('submit', function(e) {

        var formData = new FormData(this);
        var uploadContainer = $('#imageuploadform');

        $.ajax({
            type: uploadContainer.data('method'),
            url: uploadContainer.data('action'),
            data:formData,
            xhr: function() {
                var myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){
                    myXhr.upload.addEventListener('progress', progress, false);
                }
                return myXhr;
            },
            cache:false,
            contentType: false,
            processData: false,

            success:function(data){
                console.log(data);

                alert('data returned successfully');

            },

            error: function(data){
                console.log(data);
            }
        });

        e.preventDefault();

    });

    function progress(e) {

        if (e.lengthComputable) {
            var max = e.total;
            var current = e.loaded;

            var Percentage = (current * 100) / max;
            console.log(Percentage);


            if (Percentage >= 100) {
                // process completed
            }
        }
    }
})(jQuery);