(function ($) {

    //list of handlers
    var handlers = {};

    //rebuild jekyll site
    handlers.generateBlog = function(elem) {
        console.log('generateBlog');

        var popupContainer = $('#popup-generator');
        popupContainer.find('.modal-body').html('<img src="images/ajax-loader.gif">');
        popupContainer.modal();

        var afterExec = function(result) {
            popupContainer.find('.modal-body').html(result);
        };
        callAjax(elem.prop('href'), {}, afterExec);
    };


    //click events
    $(document).on('click', '[data-click]', function(e){
        e.stopImmediatePropagation();
        e.preventDefault();

        var self = $(this);
        var handlerName = self.data('click');

        if (handlerName) {
            handlers[handlerName](self);
        }

        return false;
    });

})(jQuery);