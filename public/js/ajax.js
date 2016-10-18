//main ajax method
var callAjax = function(url, data, callback, method, options) {
    options = options || {};
    var ajaxOptions = {
        cache: false,
        type: method || 'GET',
        url: url,
        data: data
    };

    for (var key in options) {
        if (options.hasOwnProperty(key)) {
            ajaxOptions[key] = options[key];
        }
    }

    $.ajax(ajaxOptions).then(function(result) {
        callback(result);
    });
};