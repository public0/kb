'use strict';
var modals = {
    confirm: function (self, title, message, ok, cancel, type) {
        $('.modal').remove();
        if (typeof ok === 'undefined') {
            ok = 'OK';
        }
        if (typeof cancel === 'undefined') {
            cancel = 'Cancel';
        }
        if (typeof type === 'undefined') {
            type = 'modal-sm';
        }
        var html = '<div class="modal show" aria-modal="true">';
        html += '<div class="modal-dialog ' + type + '" role="document">';
        html += '<div class="modal-content">';
        html += '<div class="modal-header">';
        html += '<h6 class="modal-title">' + title + '</h6>';
        html += '<button aria-label="' + cancel + '" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">×</span></button>';
        html += '</div>';
        html += '<div class="modal-body">';
        html += '<p>' + message + '</p>';
        html += '</div>';
        html += '<div class="modal-footer justify-content-center">';
        html += '<button class="btn btn-indigo" type="button">' + ok + '</button>';
        html += '<button class="btn btn-secondary" data-dismiss="modal" type="button">' + cancel + '</button>';
        html += '</div>';
        html += '</div>';
        html += '</div>';
        html += '</div>';

        $('body').append(html);
        $('.modal').modal().on('hidden.bs.modal', function (e) {
            $(this).remove();
        });

        $('.modal .btn-indigo').on('click', function () {
            var href = $(self).attr('href');
            if (href) {
                window.location = href;
            }
        });

        return false;
    }
};
