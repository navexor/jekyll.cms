(function ($) {
    //list of handlers
    var handlers = {};
    handlers.generateBlog = function(elem) {
        console.log('generateBlog');

        var popupContainer = $('#popup-generator');
        popupContainer.modal();
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