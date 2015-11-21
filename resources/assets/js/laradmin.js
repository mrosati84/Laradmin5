(function($, window) {
    'use strict';

    var LARADMIN = window.LARADMIN || {};

    LARADMIN.destroy = function(event, path) {
        event.preventDefault();
        var _token = $('meta[name="_token"]').attr('content');

        if (confirm('Are you sure?')) {
            $.ajax({
                url: path,
                type: 'DELETE',
                data: {
                    _token: _token
                },
                success: function(result) {
                    location.reload();
                }
            });
        }
    };

    window.LARADMIN = LARADMIN;
}(jQuery, this));